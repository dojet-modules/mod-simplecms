<?php
/**
 * Filename: ModuleSimpleCMS.class.php
 *
 * @author liyan
 * @since 2015 9 10
 */
namespace Mod\SimpleCMS;

use \BEGLOBAL\BaseModule;
use \BEGLOBAL\IDatabaseModule;
use \Mod\SimpleUser\ModuleSimpleUser;

class ModuleSimpleCMS extends BaseModule
implements IDatabaseModule {

    protected $database;

    public function database() {
        return $this->database;
    }

    public function setDatabase($database) {
        $this->database = $database;
        ModuleSimpleUser::module()->setDatabase($database);
        return $this;
    }

}
