<?php
/**
 * @author liyan
 * @since 2015 6 24
 */
abstract class CMSMetaBaseAction extends CMSPageBaseAction {

    protected $conf;

    function __construct() {
        parent::__construct();
        $this->conf = $this->loadConfig($this->metaName());
    }

    final protected function cmsPageAction(MCMSUser $user) {
        $this->title = $this->conf['title'];
        $this->assign('metaName', $this->metaName());
        $this->executeMetaAction($user);
    }

    abstract protected function executeMetaAction(MCMSUser $user);

    protected function metaName() {
        return MRequest::getParam('name');
    }

    private function loadConfig($metaName) {
        $confFile = CONFIG.'meta/'.$metaName;
        Config::loadConfig($confFile);
        return Config::configForKeyPath('meta.'.$metaName);
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