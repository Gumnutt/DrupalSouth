<?php
/**
 * @file
 * Drupal settings entry point.
 *
 * @see https://api.drupal.org/api/drupal/sites!default!default.settings.php/10
 */

$databases = [];
$config_directories = [];
$settings['hash_salt'] = 'cf5316278fdcce2ae17130bd88649a10';
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';
$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];
$settings['config_sync_directory'] = '../config/sync';

// Include a generic Platform.sh settings file if remote.
$platformsh = new \Platformsh\ConfigReader\Config();
if ($platformsh->isValidPlatform()) {
  include_once $app_root . '/' . $site_path . '/platformsh.settings.php';
}

// Include a generic Lando file if local.
if (getenv('LANDO') == 'ON') {
  include_once $app_root . '/' . $site_path . '/lando.settings.php';
}

// Local settings. These come last so that they can override anything.
if (file_exists($app_root . '/' . $site_path . '/local.settings.php')) {
  include_once $app_root . '/' . $site_path . '/local.settings.php';
}
