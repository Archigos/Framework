<?php

/**
 * Archigos Framework
 *
 * @author     AJ Phillips <ictcsc@gmail.com>
 * @copyright  Copyright (c) 2012 - 2016 ICT/CSC
 */

 if(!defined('Config_Security_Key')) {
   die(trigger_error('Security Key Not Present or Invalid', E_USER_ERROR));
 }

 return $GLOBALS['config'] = [
  'framework'             => [
    'name'                => "Archigos' Framework",
    'directory'           => HERE,
    'version'             => $frameworkVersion
  ],
  'database'              => [
    'type'                => 'sqlite',
    'location'            => './framework.db',
    'username'            => '',
    'password'            => ''
  ],
  'session'               => [
    'name'                => 'ArchiSession',
    'token'               => 'ArchiToken'
  ],
  'remember'              => [
    'name'                => 'ArchigosFramework',
    'expiry'              => 2628000 // 1 month in seconds
  ],
  'apps'                  => [
    'shared'              => [
      'host'              => '127.0.0.1',
      'username'          => '',
      'password'          => ''
    ],
    'kodi'                => [
      'shared'            => true,
      'host'              => '127.0.0.1',
      'port'              => 86,
      'user'              => '',
      'pass'              => '',
    ],
    'sabnzbd'             => [
      'shared'            => true,
      'host'              => '127.0.0.1',
      'port'              => 8080,
      'user'              => '',
      'pass'              => '',
      'apikey'            => ''
    ]
  ],
  'services'              => [
    'fanarttv'            => [
      'home'              => 'http://fanart.tv',
      'userKey'           => '',
      'progKey'           => '',
      'apiURL'            => 'http://webservice.fanart.tv/v3/'
    ],
    'thetvdb'             => [
      'home'              => 'http://thetvdb.com',
      'apiKey'            => '',
      'apiURL'            => 'https://api.thetvdb.com/'
    ]
  ],
  'sites'                 => [
    'nzbsu'               => [
      'home'              => 'http://nzb.su/index.php',
      'apiKey'            => '',
      'apiURL'            => 'https://api.nzb.su/rss?t=0&dl=1&i=3076&r='
    ]
  ]
];
