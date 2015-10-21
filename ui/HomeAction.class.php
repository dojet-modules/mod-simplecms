<?php
/**
 * Homepage
 *
 * Filename: HomeAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2014 3 14
 */
namespace Mod\SimpleCMS;

class HomeAction extends CMSPageBaseAction {

    protected function cmsPageAction(MCMSUser $user) {
        $this->page = 'home/welcome.tpl.php';
    }

    protected function topMenuKey() {

    }

}
