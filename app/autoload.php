<?php

/*
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

if(!defined('Config_Security_Key')) {
  die(trigger_error('Security Key Not Present or Invalid', E_USER_ERROR));
}

spl_autoload_register(function($class) {
  $prefix   = str_replace($_SERVER['DOCUMENT_ROOT'] . DS, '', HERE);
  $prefix   = str_replace(DS, '', $prefix) . '\\';
  $base     = HERE . 'classes/';
  $length   = 9;

  $rel_class  = substr($class, $length);
  $file       = $base . str_replace('\\', '/', $rel_class) . '.php';

  if(file_exists($file)) {
    return require_once $file;
  } else {
    die(trigger_error('File: ' . $file . ' not found.', 256));
  }
});
