<?php

// Execute only via shell
if(php_sapi_name() !== 'cli') {
    die ("Script executable only via shell");
}
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('default_socket_timeout', '-1');

require __DIR__ . '/../vendor/autoload.php';

$container = require(__DIR__ . '/../config/container.php');