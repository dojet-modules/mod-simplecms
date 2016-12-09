<?php
/**
 * Homepage
 *
 * Filename: UserEditAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

use Mod\SimpleUser\DalSimpleUser;

class UserEditAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $uid = \MRequest::param('uid');
        $simpleUser = DalSimpleUser::getUser($uid);
        $userinfo = DalSimpleCMSUserinfo::getUserinfo($uid);
        $roles = DalSimpleCMSRole::getRoles();
        $this->assign('simpleUser', $simpleUser);
        $this->assign('userinfo', $userinfo);
        $this->assign('roles', $roles);
        $this->title = '编辑用户信息';
        $this->page = 'user/useradd.tpl.php';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array();
    }

}
