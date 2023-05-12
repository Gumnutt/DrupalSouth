<?php

namespace Drupal\ds_webform\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElementBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides a 'repeatable_title' element.
 *
 * @WebformElement(
 *   id = "repeatable_title",
 *   label = @Translation("Repeatable title"),
 *   description = @Translation("Provides a repeatable title element."),
 *   category = @Translation("Extension elements"),
 * )
 *
 * @see \Drupal\repeatable_title\Element\RepeatableTitle
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class RepeatableTitle extends WebformElementBase {

  /**
   * {@inheritdoc}
   */
  protected function defineDefaultProperties() {
    // Here you define your webform element's default properties,
    // which can be inherited.
    //
    // @see \Drupal\webform\Plugin\WebformElementBase::defaultProperties
    // @see \Drupal\webform\Plugin\WebformElementBase::defaultBaseProperties
    return [
      'multiple' => '',
      'size' => '',
      'minlength' => '',
      'maxlength' => '',
      'placeholder' => '',
    ] + parent::defineDefaultProperties();
  }

  /* ************************************************************************ */

  /**
   * {@inheritdoc}
   */
  public function prepare(array &$element, WebformSubmissionInterface $webform_submission = NULL) {
    parent::prepare($element, $webform_submission);

    // Here you can customize the webform element's properties.
    // You can also customize the form/render element's properties via the
    // FormElement.
    //
    // @see \Drupal\repeatable_title\Element\RepeatableTitle::processWebformElementExample
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $form['repeats'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number of repeats'),
      '#default_value' => $this->configuration['repeat'] ?? '',
      '#required' => TRUE,
    ];
    // Here you can define and alter a webform element's properties UI.
    // Form element property visibility and default values are defined via
    // ::defaultProperties.
    //
    // @see \Drupal\webform\Plugin\WebformElementBase::form
    // @see \Drupal\webform\Plugin\WebformElement\TextBase::form
    return $form;
  }

}
