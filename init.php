<?php
namespace Mod\SimpleCMS;

use \DAutoloader;
use \Config;

require_once dirname(__FILE__).'/../mod-simpleuser/init.php';

define('SIMPLE_CMS_UI', dirname(__FILE__).'/ui/');
define('SIMPLE_CMS_TEMPLATE', dirname(__FILE__).'/template/');
define('SIMPLE_CMS_CONFIG', dirname(__FILE__).'/config/');

DAutoloader::getInstance()->addNamespacePathArray(__NAMESPACE__,
    array(
        dirname(__FILE__).'/',
        dirname(__FILE__).'/lib/',
        dirname(__FILE__).'/dal/',
        dirname(__FILE__).'/model/',
    )
);

Config::loadConfig(SIMPLE_CMS_CONFIG.'route');
