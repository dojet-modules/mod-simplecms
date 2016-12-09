<?php
/**
 * Homepage
 *
 * Filename: UserCommitAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

use \MRequest;
use \DAssert;
use Mod\SimpleUser\LibSimpleUser;
use Mod\SimpleUser\DalSimpleUser;

class UserCommitAction extends CMSBaseAction {

    protected function cmsAction(MCMSUser $user) {
        $uid = MRequest::post('uid');
        $username = MRequest::post('username');
        $password = MRequest::post('password');
        $fullname = MRequest::post('fullname');
        $gender = MRequest::post('gender');
        $email = MRequest::post('email');
        $tel = MRequest::post('tel');
        $rid = MRequest::post('rid');
        if ($uid) {
            // edit
        } else {
            // add
            LibSimpleUser::addUser($username, $password);
            $uid = DalSimpleUser::insertID();
        }
        DalSimpleCMSUserinfo::setUserinfo($uid, $fullname, $gender, $email, $tel, $rid);
        redirect('/user/list');
    }

    protected function pagePermissions() {
        return array();
    }

}
