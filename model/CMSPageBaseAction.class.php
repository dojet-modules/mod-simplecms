<?php
/**
 * description
 *
 * Filename: CMSPageBaseAction.class.php
 *
 * @author liyan
 * @since 2014 12 18
 */
namespace Mod\SimpleCMS;

use \Config;

abstract class CMSPageBaseAction extends CMSBaseAction {

    protected $title;
    protected $page;

    abstract protected function cmsPageAction(MCMSUser $user);
    abstract protected function topMenuId();

    final protected function cmsAction(MCMSUser $user) {
        $this->cmsPageAction($user);
        $this->displayPage($user);
    }

    private function displayPage(MCMSUser $user) {
        $this->assign('title', $this->title);
        $this->assign('page', $this->page);

        $menuId = $this->topMenuId();
        $this->assign('menu_id', $menuId);
        $this->assign('top_menu', MMenu::topMenu());
        $this->assign('left_menu', MMenu::leftMenu($menuId));

        $this->assign('fullname', $user->getFullname());
        $this->assign('userid', $user->uid());
        $this->assign('permissions', $user->getPermissions());

        $this->displayTemplate('framework.tpl.php');
    }

    protected function permissionDenied(MCMSUser $user) {
        $this->page = 'permissiondeny.tpl.php';
        $this->displayPage($user);
    }

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

}
