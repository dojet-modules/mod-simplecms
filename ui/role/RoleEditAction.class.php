<?php
/**
 * Homepage
 *
 * Filename: RoleEditAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

class RoleEditAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $pms = \Config::configForKeyPath('permission');
        $rid = \MRequest::param('rid');
        $role = LibRole::getRole($rid);
        $this->assign('role', $role);
        $this->assign('pms', $pms);
        $this->title = '编辑角色';
        $this->page = 'role/roleadd.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
