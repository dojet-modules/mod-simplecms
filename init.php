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

Config::loadConfig(__DIR__.'/config/route');
Config::loadConfig(__DIR__.'/config/permissions');

$menuAdmin = MMenu::menu('admin', '管理员管理', '/admin', array());
MMenu::setMenu($menuAdmin);
MMenu::setMenu(MMenu::menu('role', '角色管理', '/role', array()));
// $menuAdmin->addSubmenu(MMenu::menu('role', '角色管理', '/role', array()));
// print_r(MMenu::root()->toArray());
print_r(MMenu::root()->toArray());
