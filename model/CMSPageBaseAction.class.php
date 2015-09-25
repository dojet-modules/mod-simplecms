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

use \Mod\SimpleUser\MSimpleUser;
use \Config;

abstract class CMSPageBaseAction extends CMSBaseAction {
    const FAILED = 'failed';
    const SUCCESS = 'success';
    const DEFAULT_PAGESIZE = 10;

    protected $page;
    protected $title;
    protected $params = array();
    protected $count = 9999;
    protected $pageSize = 9999;
    protected $pageNo = 0;
    protected $search = array();

    abstract protected function cmsPageAction(MSimpleUser $user);
    abstract protected function topMenuKey();

    final protected function cmsAction(MSimpleUser $user) {
        $this->cmsPageAction($user);
        $this->displayPage($user);
    }

    private function displayPage(MSimpleUser $user) {
        $menuConf = Config::configForKeyPath('menu');
        $this->assign('top_menu', $menuConf);

        $menuKey = $this->topMenuKey();
        $leftMenu = $menuConf[$menuKey]['left'];

        $this->assign('left_menu', $leftMenu);

        $this->assign('menu_key', $menuKey);

        $this->assign('title', $this->title);
        $this->assign('page', $this->page);

        $this->assign('fullname', $user->getFullname());
        $this->assign('userid', $user->uid());
        $this->assign('permissions', $user->getPermissions());

        $this->displayTemplate('framework.tpl.php');
    }

    protected function permissionDenied(MSimpleUser $user) {
        $this->page = 'permissiondeny.tpl.php';
        $this->displayPage($user);
    }

    protected function displayResultBox($title, $content, $link) {
        $this->assign('title', $title);
        $this->assign('content', $content);
        $this->assign('link', $link);
        $this->page = 'misc/result.tpl.php';
        $this->title = $title;
    }

}
