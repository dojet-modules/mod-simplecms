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
                `rid` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '角色ID',
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

    public static function getUserList($ps = 0, $pn = 0xffffffff) {
        DAssert::assertNumeric($ps);
        DAssert::assertNumeric($pn);
        $tableName = self::tableName();
        $sql = "SELECT *
                FROM $tableName
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

    public static function setUserinfo($uid, $fullname, $gender, $email, $tel, $rid) {
        $tableName = self::tableName();
        $arrIns = array(
            'uid' => $uid,
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'tel' => $tel,
            'rid' => $rid,
        );
        $arrUpd = array(
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'tel' => $tel,
            'rid' => $rid,
        );
        return self::doInsertUpdate($tableName, $arrIns, $arrUpd);
    }

}
