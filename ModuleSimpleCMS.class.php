<?php
/**
 * Filename: ModuleSimpleCMS.class.php
 *
 * @author liyan
 * @since 2015 9 10
 */
namespace Mod\SimpleCMS;

use \BaseModule;
use \DAssert;
use \IDatabaseModule;
use \Mod\SimpleUser\ModuleSimpleUser;

class ModuleSimpleCMS extends BaseModule
implements IDatabaseModule {

    protected $database;
    protected $tableNameRole = 'simple_cms_role';
    protected $tableNameUserinfo = 'simple_cms_userinfo';
    protected $tableNameUserRole = 'simple_cms_user_role';
    protected $tableNameUserPermission = 'simple_cms_user_permission';

    public function database() {
        return $this->database;
    }

    protected function depends() {
        return array('mod-simpleuser');
    }

    public function setDatabase($database) {
        $this->database = $database;
        ModuleSimpleUser::module()->setDatabase($database);
        return $this;
    }

    public function setTableNameUserRole($tableName) {
        $this->tableNameUserRole = $tableName;
        return $this;
    }

    public function tableNameUserRole() {
        DAssert::assert(!empty($this->tableNameUserRole), 'tableNameUserRole should not be empty');
        return $this->tableNameUserRole;
    }

    public function setTableNameRole($tableName) {
        $this->tableNameRole = $tableName;
        return $this;
    }

    public function tableNameRole() {
        DAssert::assert(!empty($this->tableNameRole), 'tableNameRole should not be empty');
        return $this->tableNameRole;
    }

    public function setTableNameUserPermission($tableName) {
        $this->tableNameUserPermission = $tableName;
        return $this;
    }

    public function tableNameUserPermission() {
        DAssert::assert(!empty($this->tableNameUserPermission), 'tableNameUserPermission should not be empty');
        return $this->tableNameUserPermission;
    }

    public function setTableNameUserinfo($tableName) {
        $this->tableNameUserinfo = $tableName;
        return $this;
    }

    public function tableNameUserinfo() {
        DAssert::assert(!empty($this->tableNameUserinfo), 'tableNameUserinfo should not be empty');
        return $this->tableNameUserinfo;
    }

}
