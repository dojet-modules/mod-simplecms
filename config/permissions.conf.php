<?php
$__c = &Config::configRefForKeyPath('permission');

define('PMS_USER_ADD', 1000);
define('PMS_USER_DEL', 1001);
define('PMS_USER_VIEW', 1002);

define('PMS_ROLE_ADD', 2000);
define('PMS_ROLE_DEL', 2001);
define('PMS_ROLE_VIEW', 2002);

define('PMS_LOG_VIEW', 2100);

$__c = array(
    PMS_USER_ADD => '添加用户',
    PMS_USER_DEL => '删除用户',
    PMS_USER_VIEW => '浏览用户',

    PMS_ROLE_ADD => '创建角色',
    PMS_ROLE_DEL => '删除角色',
    PMS_ROLE_VIEW => '浏览角色',

    PMS_LOG_VIEW => '查看日志',
);

unset($__c);
