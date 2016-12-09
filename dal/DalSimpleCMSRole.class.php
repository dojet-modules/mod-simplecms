<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSimpleCMSRole.class.php
 *
 * @author liyan
 * @since 2015 7 21
 */
namespace Mod\SimpleCMS;

use \BaseModuleDal;
use \DAssert;

class DalSimpleCMSRole extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameRole();
    }

    static function init() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'role id',
                  `rolename` varchar(32) NOT NULL COMMENT '角色名称',
                  `pids` text NOT NULL COMMENT '权限集',
                  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
                  PRIMARY KEY (`rid`),
                  UNIQUE KEY `rolename` (`rolename`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS角色';";
        self::doCreateTable($sql);
        $admin_pms = array_keys(\Config::configForKeyPath('permission'));
        self::doInsert($tableName, array('rolename' => '管理员', 'pids' => json_encode($admin_pms)));
        self::doInsert($tableName, array('rolename' => '普通用户', 'pids' => '[]',));
    }

    public static function getRoles($ps = 0, $pn = 0xffffffff) {
        DAssert::assertNumeric($ps);
        DAssert::assertNumeric($pn);
        $tableName = static::tableName();
        $sql = "SELECT *
                FROM `$tableName`
                LIMIT $ps, $pn";
        return self::rs2keyarray($sql, 'rid');
    }

    public static function getRole($rid) {
        DAssert::assertNumeric($rid);
        $tableName = static::tableName();
        $sql = "SELECT *
                FROM $tableName
                WHERE rid=$rid";
        return self::rs2rowline($sql);
    }

    public static function addRole($rolename, $pids) {
        $arrIns = array(
            'rolename' => $rolename,
            'pids' => $pids,
        );
        return self::doInsert(static::tableName(), $arrIns);
    }

    public static function updateRole($rid, $rolename, $pids) {
        DAssert::assertNumeric($rid);
        $arrUpd = array(
            'rolename' => $rolename,
            'pids' => $pids,
        );
        $where = "rid=$rid";
        return self::doUpdate(static::tableName(), $arrUpd, $where, 1);
    }

}
