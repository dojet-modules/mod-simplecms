<?php
/**
 * Homepage
 *
 * Filename: UserAddAction.class.php
 *
 * @author liyan
 * @since 2016 12 8
 */
namespace Mod\SimpleCMS;

class UserAddAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $pms = \Config::configForKeyPath('permission');
        $roles = DalSimpleCMSRole::getRoles();
        $this->assign('roles', $roles);
        $this->title = '添加用户';
        $this->page = 'user/useradd.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
