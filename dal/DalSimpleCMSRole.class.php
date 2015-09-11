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
class DalSimpleCMSRole extends BaseModuleDal {

    static function module() {
        return ModuleSimpleCMS::module();
    }

    protected static function tableName() {
        return static::module()->tableNameRole();
    }

    static function createTable() {
        $tableName = static::tableName();
        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
                  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'role id',
                  `role_name` varchar(32) NOT NULL COMMENT 'role name',
                  PRIMARY KEY (`rid`),
                  UNIQUE KEY `role_name` (`role_name`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cms role';";
        return self::doCreateTable($sql);
    }

    public static function getRoles($ps, $pn) {
        $tableName = static::tableName();
        DAssert::assertNumeric($ps);
        DAssert::assertNumeric($pn);
        $sql = "SELECT *
                FROM `$tableName`
                LIMIT $ps, $pn";
        return self::rs2array($sql);
    }

}
