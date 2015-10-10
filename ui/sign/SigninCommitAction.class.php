<?php
/**
 * Filename: SigninCommitAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2014 12 18
 */
namespace Mod\SimpleCMS;

use \XBaseAction;
use \MCookie;
use \MRequest;
use \Mod\SimpleUser\LibSimpleUser;
use \Mod\SimpleUser\MSimpleUser;

class SigninCommitAction extends XBaseAction {

    public function execute() {
        $username = MRequest::post('username');
        $password = MRequest::post('password');

        $md5password = MSimpleUser::md5password($password);

        MSimpleUser::userFromUsernamePassword($username, $md5password);

        LibSimpleUser::persistentAuth($username, $md5password);

        $redirect = MCookie::getCookie('signin_redirect');
        MCookie::removeCookie('signin_redirect');
        if (!$redirect) {
            $redirect = '/';
        }
        redirect($redirect);
    }

}
