<?php
/**
 * Homepage
 *
 * Filename: UserListAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

class UserListAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $userlist = DalSimpleCMSUserinfo::getUserList();
        $this->assign('userlist', $userlist);
        $this->title = '查看用户';
        $this->page = 'user/userlist.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
