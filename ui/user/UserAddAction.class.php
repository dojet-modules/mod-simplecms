<?php
/**
 * Homepage
 *
 * Filename: UserAddAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

use \XBaseAction;

class UserAddAction extends CMSPageBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    protected function cmsPageAction(MCMSUser $user) {
        $this->title = '添加用户';
    }

    protected function topMenuId() {
        return 'admin';
    }

    protected function pagePermissions() {
        return array(PMS_USER_ADD);
    }

}
