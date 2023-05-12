<?php
use Drupal\webform\Entity\Webform;
use Drupal\Component\Utility\Html;

/***
 * hook the webform
 * process conditions
 * sanitise them
 *
 * @param $variables
 * @return void
 *
 */
function drupal_south_preprocess_webform(&$variables)
{

  $variables['modern_form'] = false;
  $id = $variables['element']['#webform_id'];
  $webform = Webform::load($id);
  $elements = $webform->getElementsInitialized();

  $enable = $webform->getThirdPartySetting('drupal_south_webform', 'modern_form');

  if(!$enable){
    return;
  }

  //@todo remove when we're done here
  //dd($elements);

  $data = [];
  foreach($elements as $element){

    $title = $element['#title'];
    $question_key = $element['#webform_key'];
    $fields = [];

    foreach($element as $key => $field){
      if (!str_starts_with($key, '#')) {
        $fields[] = drupal_south_webform_process_field($field);
      }
    }

    if(isset($element['#title'])){

      $data[] = [
        'key' => $question_key,
        'title' => $title,
        'conditions' => drupal_south_webform_extra_conditions($element),
        'fields' => $fields,
      ];
    }
  }
  
  $variables['#attached']['drupalSettings']['webform'] = [
    'formId' => $id,
    'data' => $data
  ];

  $variables['modern_form'] = true;

}

/**
 * @param $field
 * @return array
 */
function drupal_south_webform_process_field($field)
{
  $field_key = $field['#webform_key'];

  $title = $field['#title'];
  $title = isset($title) ? $title : '';
  $type = $field['#type'];
  $question = '';
  preg_match('/(^[0-9\.]+) (.*)/', $title, $title_parts);
  if (count($title_parts) === 3) {
    $question = trim($title_parts[1], '.');
    if(\Drupal::currentUser()->isAnonymous()) {
      $title = $title_parts[2];
    }
  }
  $content = '';

  if ($type === 'processed_text'){
    if (str_contains($field['#text'], 'drupal-media')) {
      $type = 'media';
      // load the html from the field. '@' used to mute warning from expected drupal-media tag
      $DOM = new DOMDocument;
      @$DOM->loadHTML($field['#text']);
      // get the html element
      $media_element = $DOM->getElementsByTagName('drupal-media');
      // get the uuid from the element
      $uuid = $media_element[0]->getAttribute('data-entity-uuid');
      // load the media entity and get its url
      $entity = \Drupal::service('entity.repository')->loadEntityByUuid('media', $uuid);
      $uri = $entity->get('field_media_image')->entity->getFileUri();
      $media_url = \Drupal::service('file_url_generator')->generateAbsoluteString($uri);
      $content = $media_url;
    }else{
      $content = $field['#text'];
    }
    
  } elseif ($type === 'webform_message') {
    $content = strip_tags($field['#message_message']);
  }


  $data = [
    'key' => $field_key,
    'type' => $type,
    'id' => $field_key,
    'label' => $title,
    'question' => $question,
    'description' => !empty($field['#description']) ? $field['#description'] : '',
    'required' => isset($field['#required']) && $field['#required'] === true,
    'conditions' => drupal_south_webform_extra_conditions($field),
    'options' => drupal_south_webform_process_options($field),
    'content' => $content,
    'extras' => drupal_south_webform_process_extras($field),
  ];

  if($help = drupal_south_webform_process_help($field)){
    $data['help'] = $help;
  }

  if(!empty($field['#terms'])){
    $data['terms'] = drupal_south_webform_load_terms($field['#terms']);
  }

  return $data;
}

/**
 * @param $terms
 * @return array|false
 */
function drupal_south_webform_load_terms($terms)
{
  if(empty($terms)){
    return false;
  }

  $data = [];

  try {
    $tids = array_column($terms, 'target_id');
    $terms = \Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadMultiple($tids);

    /** @var \Drupal\taxonomy\Entity\Term $term */
    foreach ($terms as $term){
      $data[] = [
        'id' => $term->id(),
        'slug' => Html::getClass($term->label()),
        'title' => $term->label(),
        'acronym' => $term->hasField('field_acronym') && $term->get('field_acronym')->first() ?
          $term->get('field_acronym')->first()->getValue()['value'] : null,
        'description' => $term->getDescription(),
      ];
    }
  } catch (\Exception $e){
    // silence
  }

  return $data;
}

/**
 * @param $field
 * @return array|false
 */
function drupal_south_webform_process_help($field)
{
  $help = [];
  if(!empty($field['#help_title'])){
    $help['title'] = $field['#help_title'];
  }

  if(!empty($field['#help'])){
    $help['text'] = $field['#help'];
  }

  return !empty($help) ? $help : false;
}

/***
 * @param $field
 * @return array|string[]
 */
function drupal_south_webform_process_options($field)
{
  if(empty($field['#options'])){
    return [];
  }

  return array_map(function ($option){
    $parts = explode(' -- ', $option, 2);
    return count($parts) === 2 ? $parts[1] : $option;
  }, $field['#options']);
}

function drupal_south_webform_process_extras($field){
  // merge two arrays to make a single array of attributes

  $attributes = array_merge(isset($field['#attributes']) ? $field['#attributes'] : [], isset($field['#wrapper_attributes']) ? $field['#wrapper_attributes'] : []);
  $extras = [];
  foreach($attributes as $key => $value){
    $extras[$key] = $value;
  }
  return $extras;
}


/**
 * @param $element
 * @return array
 */
function drupal_south_webform_extra_conditions($element)
{
  if(empty($element['#states'])){
    return [];
  }

  // and
  // or
  // xor

  $rules = [];
  $or = false;
  $xor = false;
  $action = "";
  foreach($element['#states'] as $action => $rule){
    $xor = in_array('xor', $rule);
    $or = in_array('or', $rule);

    if($xor || $or){
      $rule = array_filter($rule, function($item){
        return !in_array($item, ['xor', 'or']);
      });

      $rules = [...array_map(function($item){ return drupal_south_webform_process_rule($item); }, $rule)];

    } else {
      $rules[] = drupal_south_webform_process_rule($rule);
    }
  }

  if(empty($rules)){
    return $rules;
  }


  return [
    'state' => $action,
    'operator' => $or ? 'or' : ($xor ? 'xor' : 'and'),
    'rules' => array_values($rules),
  ];
}

/**
 * @param $rule
 * @return array
 */
function drupal_south_webform_process_rule($rule)
{
  $rules = [];
  foreach($rule as $selector => $logic){
    preg_match("/(?<=\")(.*?)(?=\")/", $selector, $matches);
    $rule_key = $matches[0];
    $rules[] = [
      'field' => $rule_key,
      'logic' => $logic,
    ];
    //$rules[$rule_key] = $logic;
  }
  return $rules;
}
