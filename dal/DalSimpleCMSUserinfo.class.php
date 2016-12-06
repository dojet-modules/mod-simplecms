<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSimpleCMSUserinfo.class.php
 *
 * @author liyan
 * @since 2015 9 25
 */
namespace Mod\SimpleCMS;

use \BaseModuleDal;
use \DAssert;

class DalSimpleCMSUserinfo extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameUserinfo();
    }

    static function init() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `uid` int(11) NOT NULL COMMENT '用户id',
                  `fullname` varchar(64) NOT NULL COMMENT '用户全名',
                  `gender` enum('','MALE','FEMALE') NOT NULL COMMENT '性别',
                  `email` varchar(64) NOT NULL COMMENT 'Email',
                  `tel` varchar(16) NOT NULL COMMENT '电话',
                  `recruit` BOOLEAN DEFAULT 1 COMMENT '是否新用户',
                  PRIMARY KEY (`uid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SimpleCMS用户信息';";
        return self::doCreateTable($sql);
    }

    public static function getUserinfo($uid) {
        DAssert::assertNumeric($uid);
        $tableName = self::tableName();
        $sql = "SELECT *
                FROM $tableName
                WHERE uid=$uid";
        return self::rs2rowline($sql);
    }

}
