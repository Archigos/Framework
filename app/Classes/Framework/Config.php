<?php

namespace Archigos\Framework;

if(!defined('Config_Security_Key')) {
 die(trigger_error('Security Key Not Present or Invalid', 256));
}

class Config {
  public function __construct() {}

  public function __clone() {
    trigger_error('Cloning the registry is not permitted...', 256);
  }

  public static function get($path = NULL) {
    if($path) {
      $c = $GLOBALS['config'];
      $p = explode('/', $path);

      foreach($p as $bit) {
        if(isset($c[$bit])) {
          $c = $c[$bit];
        } else {
          $c = "Error: $bit does not exist!";
          break;
        }
      }

      if(is_array($c)) {
        $new = "<br />\n";
        foreach($c as $k => $v) {
          if(is_array($v)) {
            $new .= "<strong>{$k}</strong><br />\n";
          } else {
            $new .= "$k: $v<br />\n";
          }
        }
        $c = $new;
      }
      return $c;
    }
    return $c = 'Unknown Error!';
  }
}

?>
