<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

session_cache_limiter(false);
session_start();

$frameworkVersion = "8.03-alpha";

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
  $GLOBALS['config']['framework']['version'] = $frameworkVersion;
// Auto-loader
require_once HERE . 'autoload.php';
// Functions
require_once HERE . 'functions.php';
// User Variables
require_once HERE . 'uservars.php';

// Maintenance
require_once HERE . 'maintenance.php';
