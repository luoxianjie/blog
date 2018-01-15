<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define('APP_NAME','lxj');

define('APP_PATH','./lxj/');

define('APP_DEBUG',true);

require './ThinkPHP/ThinkPHP.php';
