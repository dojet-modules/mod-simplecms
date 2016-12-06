<?php
/**
 * Homepage
 *
 * Filename: RoleListAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

class RoleListAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $roles = DalSimpleCMSRole::getRoles();
        $this->assign('roles', $roles);
        $this->title = '查看角色';
        $this->page = 'role/rolelist.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
