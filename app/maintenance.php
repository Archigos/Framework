<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

if(!defined('Config_Security_Key')) {
 die(trigger_error('Security Key Not Present or Invalid', 256));
}

$ipAddress = [
  '127.0.0.1',
  '::1',
  '192.168.1.2',
  '192.168.1.3'
];
if(isset($systemIP) && !is_null($systemIP)) {
  array_unshift($ipAddress, $systemIP);
}

if(isset($maintenance) && ($maintenance === true || strtolower($maintenance) === 'on')) {
  // Maintenance is turned on
  if(!in_array(getenv('REMOTE_ADDR'), $ipAddress)) {
    die(trigger_error('Maintenance mode is active, therefore no outside access allowed.', 256));
  } else {
    $debug = true;
    // Developer::maintenance();
  }
} elseif(!isset($maintenance)) {
  die(trigger_error('Maintenance mode is active, therefore no outside access allowed.', 256));
}
