<?php
define('PRJ', realpath(dirname(__FILE__).'/../').'/');
include(PRJ.'../be-dojet/dojet.php');

if (php_sapi_name() != "cli"){
    die("only run in command line mode\n");
}
