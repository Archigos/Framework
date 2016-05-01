<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

use Archigos\Admin\Registry;
use Archigos\Admin\Developer;
use Archigos\Framework\Config;
use Archigos\Framework\Templates;
use Archigos\User\User;

$frameworkVersion = "8.05-alpha";

// Definitions
require_once __DIR__ . '/definitions.php';
// Main Config
  if(file_exists(HERE . 'config.php')) {
    require_once HERE . 'config.php';
  } else {
    if(file_exists(HERE . 'config_sample.php')) {
      if(!copy(HERE . 'config_sample.php', HERE . 'config.php')) {
        trigger_error('Sample Config Could Not Be Copied...');
      }
    }
    trigger_error('Config File Missing', 256);
  }
// Auto-loader
require_once HERE . 'autoload.php';

// Functions
require_once HERE . 'functions.php';

// User Variables
require_once HERE . 'uservars.php';

// Maintenance
require_once HERE . 'maintenance.php';

$reg   = Registry::singleton();
$dev   = new Developer;
$tpl   = new Templates;
if(!isset($user)) {
  $user  = new User;
}

ini_set('session.name', Config::get('session/name'));
session_start();

function errorLog() {
  if(file_exists(ini_get('error_log'))) {
    echo "<p class='flashStatus2'>Error Log Exists</p>";
  }
}
errorLog();


?>
