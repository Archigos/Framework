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

// Make your changes below here.
$maintenance  = 'on';
$systemIP     = NULL;

$username     = 'Archigos';
$emailAddress = 'ictcsc@gmail.com';

$date         = date("D, F dS, Y");
$time         = date("h:i:s A T");
$dateTime     = "$date @ $time";
