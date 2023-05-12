<?php

$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);

$databases['default']['default'] = array (
  'database' => $lando_info['database']['creds']['database'],
  'username' => $lando_info['database']['creds']['user'],
  'password' => $lando_info['database']['creds']['password'],
  'prefix' => '',
  'host' => $lando_info['database']['internal_connection']['host'],
  'port' => $lando_info['database']['internal_connection']['port'],
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

// Lando local solr overrides.
$config['search_api.server.solr']['backend_config'] = [
  'connector' => 'standard',
  'connector_config' => [
    'host' => 'solr',
    'port' => '8983',
    'path' => '/',
    'core' => 'drupal',
  ],
];

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/lando.services.yml';

$settings['twig_debug'] = TRUE;
$settings['hot_module_replacement'] = TRUE;
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
$config['system.logging']['error_level'] = 'verbose';

// By default lando has some dev stuff turned off so that xdebug isn't slow if it's enabled in .lando.yml.
// You can override these in local.settings.php - useful examples shown here.
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$settings['update_free_access'] = FALSE;
$settings['rebuild_access'] = FALSE;
$settings['skip_permissions_hardening'] = TRUE;

$settings['trusted_host_patterns'] = ['^.+\.lndo\.site$', '^localhost$'];
