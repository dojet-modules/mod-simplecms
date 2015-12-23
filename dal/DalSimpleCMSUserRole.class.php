<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSimpleCMSUserRole.class.php
 *
 * @author liyan
 * @since 2015 7 21
 */
namespace Mod\SimpleCMS;

use \BaseModuleDal;
use \DAssert;

class DalSimpleCMSUserRole extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameUserRole();
    }

    static function init() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `urid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user role id',
                  `uid` int(10) unsigned NOT NULL COMMENT 'user id',
                  `rid` int(10) unsigned NOT NULL COMMENT 'role id',
                  PRIMARY KEY (`urid`),
                  UNIQUE KEY `uid` (`uid`,`rid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user role';";
        return self::doCreateTable($sql);
    }

    public static function getUserRoleID($uid) {
        $tableName = static::tableName();
        DAssert::assertNumeric($uid);
        $sql = "SELECT rid
                FROM `$tableName`
                WHERE uid=$uid";
        return self::rs2value($sql);
    }

}
