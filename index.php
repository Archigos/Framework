<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

use Archigos\Framework\Config;
use Archigos\Framework\Templates;

// User Editable Section - Remaining Variables in '$folderName/uservars.php'
  $folderName   = 'app';
  $initScript   = 'init.php';
// End User Editable Section

// Initialize Framework
  define('DSt', DIRECTORY_SEPARATOR);
  define('DS', (DSt === '\\') ? str_replace('\\', '/', DSt) : DSt);
  $startup   = (file_exists("./$folderName") ? $folderName : NULL);
  $location  = __DIR__ . DS . $startup . DS . $initScript;

  if(file_exists($location)) {
    require_once $location;
  }
  unset($folderName, $initScript, $startup, $location);
// Initialize Framework

$tpl->load('header');
$tpl->assign('title', Config::get('framework/name'));
$tpl->display();
$tpl->reset();

$tpl->load('topnav');

$tpl->footer();

?>
