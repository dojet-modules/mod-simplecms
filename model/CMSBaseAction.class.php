<?php
/**
 * description
 *
 * Filename: CMSBaseAction.class.php
 *
 * @author liyan
 * @since 2014 12 17
 */
namespace Mod\SimpleCMS;

use \XBaseAction;
use \DAssert;

abstract class CMSBaseAction extends XBaseAction {

    final public function execute() {

        if ($this->shouldSignin()) {
            //  check signin
            try {
                $user = MCMSUser::getSigninUser();
                DAssert::assert($user instanceof \Mod\SimpleCMS\MCMSUser, 'illegal user, must be MCMSUser');
            } catch (\Exception $e) {
                $this->notSignin();
                return;
            }
        }

        if (!$this->checkPermission($user)) {
            $this->permissionDenied($user);
            return;
        }

        return $this->cmsAction($user);
    }

    protected function shouldSignin() {
        return true;
    }

    private function checkPermission(MCMSUser $user) {
        $roleId = $user->roleID();
        $arrPagePms = $this->pagePermissions();
        if (empty($arrPagePms)) {
            //  if empty, allow all access
            return true;
        }

        $arrRolePms = $this->getRolePermissions($roleId);
        foreach ($arrRolePms as $rolePms) {
            if (in_array($rolePms, $arrPagePms)) {
                return true;
            }
        }

        return false;
    }

    private function getRolePermissions($roleId) {
        return array();
    }

    abstract protected function cmsAction(MCMSUser $user);

    protected function notSignin() {
        \MCookie::setCookie('signin_redirect', $_SERVER['REQUEST_URI'], null, '/');
        redirect('/signin');
    }

    protected function permissionDenied(MCMSUser $user) {
        die('permission deny!');
    }

    protected function pagePermissions() {
        return array();
    }

}
