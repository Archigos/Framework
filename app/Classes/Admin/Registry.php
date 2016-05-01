<?php

namespace Archigos\Admin;

if(!defined('Config_Security_Key')) {
 die(trigger_error('Security Key Not Present or Invalid', 256));
}

class Registry {
  private static $instance;

  private function __construct() {}

  public function __clone() {
    trigger_error('Cloning the registry is not permitted...', 256);
  }

  public static function singleton() {
    if(!isset(self::$instance)) {
      $obj = __CLASS__;
      self::$instance = new $obj;
    }
    return self::$instance;
  }
}
