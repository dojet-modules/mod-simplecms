<?php
/**
 *  简单的CMS
 *  dependencies: ModuleSimpleUser
 */
require_once dirname(__FILE__).'/../mod-simpleuser/init.php';

DAutoloader::getInstance()->addAutoloadPathArray(
    array(
        dirname(__FILE__).'/',
        dirname(__FILE__).'/lib/',
        dirname(__FILE__).'/dal/',
        dirname(__FILE__).'/model/',
    )
);
