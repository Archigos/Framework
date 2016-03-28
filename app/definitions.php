<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

// Standard Definitions
  if(!defined('DS')) {
    $DS = (DIRECTORY_SEPARATOR === '\\') ? str_replace('\\', '/', DIRECTORY_SEPARATOR) : DIRECTORY_SEPARATOR;
    define('DS', $DS);
  }
  if(!defined('FRAMEWORK')) {
    $fixedDir   = str_replace('\\', '/', __DIR__);
    $fixedRoot  = str_replace('\\', '/', getenv('DOCUMENT_ROOT'));
    define('FRAMEWORK', ltrim(str_replace($fixedRoot, '', $fixedDir) . DS));
  }
  if(!defined('HERE')) {
    define('HERE', $fixedDir . DS);
  }
  unset($DS, $fixedDir, $fixedRoot);
// Standard Definitions

// Sub-Domains
  $host   = getenv('HTTP_HOST');

  if($host === 'localhost') {
    $host = strtolower(getenv('COMPUTERNAME')) . '.com';
    header('Location: //' . $host);
  }

  if(!defined('sub3rd')) {
    define('sub3rd', '//3rdParty.' . $host);
  }
  if(!defined('subAPI')) {
    define('subAPI', '//api.' . $host);
  }
  if(!defined('subError')) {
    define('subError', '//error.' . $host);
  }
  if(!defined('subScripts')) {
    define('subScripts', '//scripts.' . $host);
  }
  if(!defined('subURL')) {
    define('subURL', '//url.' . $host);
  }
  unset($host);
// Sub-Domains

define('Config_Security_Key', true);
