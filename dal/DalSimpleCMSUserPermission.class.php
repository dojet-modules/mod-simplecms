<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalSimpleCMSUserPermission.class.php
 *
 * @author liyan
 * @since 2015 9 10
 */
class DalSimpleCMSUserPermission extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameUserPermission();
    }

    static function createTable() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `simple_cms_user_permission` (
                  `upid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
                  `uid` int(10) unsigned NOT NULL COMMENT 'user id',
                  `pmid` int(10) unsigned NOT NULL COMMENT 'permission id',
                  PRIMARY KEY (`upid`),
                  UNIQUE KEY `uid` (`uid`,`pmid`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cms user permission';";
        return self::doCreateTable($sql);
    }

    public static function getUserPermissions($uid) {
        $tableName = static::tableName();
        DAssert::assertNumeric($uid);
        $sql = "SELECT pid
                FROM `$tableName`
                WHERE uid=$uid";
        return self::rs2oneColumnArray($sql);
    }

}
