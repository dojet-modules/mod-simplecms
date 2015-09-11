<?php
/**
 * @author liyan
 * @since 2015 1 7
 */
abstract class CMSBlockBaseAction extends CMSPageBaseAction {

    protected $blockConf;

    protected $blockName;

    final protected function cmsPageAction(MCMSUser $user) {
        $this->blockName = $this->blockName();

        $this->blockConf = $this->loadBlockConfig($this->blockName);

        $this->title = 'title';
        $this->executeBlockAction($user);
    }

    abstract protected function executeBlockAction(MCMSUser $user);

    protected function blockTextName() {
        return $this->blockConf['title'];
    }

    abstract protected function blockName();

    private function loadBlockConfig($blockName) {
        $confFile = CONFIG.'blocks/'.$blockName;
        Config::loadConfig($confFile);
        return Config::configForKeyPath('cmsblock.'.$blockName);
    }

    protected function topMenuKey() {
        return $this->blockConf['topmenu'];
    }

    protected function pagePermissions() {
        $this->blockConf = $this->loadBlockConfig($this->blockName());
        if (array_key_exists('permission', $this->blockConf) && is_array($this->blockConf['permission'])) {
            $permission = $this->blockConf['permission'];
        } else {
            $permission = array();
        }
        return $permission;
    }

}