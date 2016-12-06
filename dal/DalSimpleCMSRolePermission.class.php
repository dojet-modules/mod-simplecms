<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSimpleCMSRolePermission.class.php
 *
 * @author liyan
 * @since 2016 12 6
 */
namespace Mod\SimpleCMS;

use \BaseModuleDal;
use \DAssert;

class DalSimpleCMSRolePermission extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameRolePermission();
    }

    static function init() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `rpid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
                  `rid` int(10) unsigned NOT NULL COMMENT 'role id',
                  `pid` int(10) unsigned NOT NULL COMMENT 'permission id',
                  PRIMARY KEY (`rpid`),
                  UNIQUE KEY `rid_pid` (`rid`,`pid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cms role permission';";
        return self::doCreateTable($sql);
    }

    public static function getRolePermissions($rid) {
        $tableName = static::tableName();
        DAssert::assertNumeric($rid);
        $sql = "SELECT pid
                FROM `$tableName`
                WHERE rid=$rid";
        return self::rs2oneColumnArray($sql);
    }

    public static function add($rid, $pid) {
        $tableName = static::tableName();
        $arrIns = array(
            'rid' => $rid,
            'pid' => $pid,
        );
        return self::doInsert($tableName, $arrIns);
    }

}
