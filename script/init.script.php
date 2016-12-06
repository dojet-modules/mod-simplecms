<?php
include(dirname(__FILE__).'/script_init.php');

$dbProxy = BaseDal::getDBProxy(DBCMS);

print "init admin password\n:";
$password = trim(fgets(STDIN, 100));

$md5password = md5($password);

$arrIns = array(
    'username' => 'admin',
    'md5password' => $md5password,
    'fullname' => '管理员',
    'email' => '',
    'rid' => 1,
    );
$arrUpd = array(
    'md5password' => $md5password,
    );
$sql = $dbProxy->insertOrUpdateStatement('users', $arrIns, $arrUpd);
$dbProxy->doInsert($sql);
