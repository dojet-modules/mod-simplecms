<?php
namespace Mod\SimpleCMS;

use \DAutoloader;
use \Config;

\Dojet::addModule(__DIR__.'/../mod-simpleuser');

define('SIMPLE_CMS_UI', dirname(__FILE__).'/ui/');
define('SIMPLE_CMS_TEMPLATE', dirname(__FILE__).'/template/');

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

MMenu::setMenu(MMenu::menu('admin', '管理员管理', '/admin', array()));

MMenu::setMenu(MMenu::menu('user', '用户管理'), 'admin');
MMenu::setMenu(MMenu::menu('adduser', '添加用户', '/user/add', array()), 'admin/user');
MMenu::setMenu(MMenu::menu('viewuser', '查看用户', '/user/view', array()), 'admin/user');

MMenu::setMenu(MMenu::menu('role', '角色管理'), 'admin');
MMenu::setMenu(MMenu::menu('addrole', '添加角色', '/role/add', array()), 'admin/role');
MMenu::setMenu(MMenu::menu('viewrole', '查看角色', '/role/view', array()), 'admin/role');
