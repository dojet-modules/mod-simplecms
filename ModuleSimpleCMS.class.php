<?php
/**
 * Filename: ModuleSimpleCMS.class.php
 *
 * @author liyan
 * @since 2015 9 10
 */
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
