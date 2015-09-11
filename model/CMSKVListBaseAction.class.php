<?php
/**
 * @author liyan
 * @since 2015 6 15
 */
abstract class CMSKVListBaseAction extends CMSPageBaseAction {

    protected $conf;

    function __construct() {
        parent::__construct();
        $this->conf = $this->loadConfig($this->kvName());
    }

    final protected function cmsPageAction(MCMSUser $user) {
        $this->title = $this->conf['title'];
        $this->assign('kvName', $this->kvName());
        $this->executeKVListAction($user);
    }

    abstract protected function executeKVListAction(MCMSUser $user);

    protected function kvName() {
        return MRequest::getParam('name');
    }

    private function loadConfig($kvName) {
        $confFile = CONFIG.'kvlist/'.$kvName;
        Config::loadConfig($confFile);
        return Config::configForKeyPath('kvlist.'.$kvName);
    }

    protected function topMenuKey() {
        return $this->conf['topmenu'];
    }

    protected function pagePermissions() {
        if (array_key_exists('permission', $this->conf) && is_array($this->conf['permission'])) {
            $permission = $this->conf['permission'];
        } else {
            $permission = array();
        }
        return $permission;
    }

}