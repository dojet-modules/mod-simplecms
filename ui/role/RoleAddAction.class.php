<?php
/**
 * Homepage
 *
 * Filename: RoleAddAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

class RoleAddAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $pms = \Config::configForKeyPath('permission');
        $this->assign('pms', $pms);
        $this->title = '添加角色';
        $this->page = 'role/roleadd.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
