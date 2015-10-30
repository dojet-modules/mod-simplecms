<?php
/**
 * Filename: SignoutAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2014 12 18
 */
namespace Mod\SimpleCMS;

class SignoutAction extends CMSBaseAction {

    protected function cmsAction(MCMSUser $user) {
        $user->signout();
        redirect('/signin');
    }

}
