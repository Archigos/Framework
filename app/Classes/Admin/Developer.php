<?php

namespace Archigos\Admin;

if(!defined('Config_Security_Key')) {
 die(trigger_error('Security Key Not Present or Invalid', 256));
}

class Developer {
  public function __construct() {}

  public function __clone() {
    trigger_error('Cloning the registry is not permitted...', 256);
  }

  public function redirect($url, $sec = 3) {
    $ret   = "Redirecting in $sec seconds";
    $ret  .= "<meta http-equiv='refresh' content='$sec, url=$url'>";
    return $ret;
  }

  public static function autoCopyright($year = 'auto') {
    if($year == 'auto') { $year = date('Y'); }

    $start   = "&copy; ";
    $middle  = intval($year) . " - " . date('Y');
    $end     = ": <a target='_blank' href='//archigos.ictcsc.net'>Archigos</a>";

    if(intval($year) == date('Y'))  { return $start.intval($year).$end; }
    if(intval($year)  < date('Y'))  { return $start.$middle.$end;       }
    if(intval($year)  > date('Y'))  { return $start.date('Y').$end;     }
  }

  public static function human_filesize($bytes, $decimals = 2) {
    $sz     = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
  }

  public static function checkReporting() {
    if(file_exists(ini_get('error_log'))) {
      return self::human_filesize(filesize(ini_get('error_log')));
    }
    return false;
  }

  public static function hexColor() {
    $chars  = 'ABCDEF0123456789';
    $val    = '';
    for($i = 0; $i < 6; $i++) {
      $j    = strval(mt_rand(0, strlen($chars) - 1));
      $val .= $chars[$j];
    }
    return '#' . $val;
  }
}

?>
