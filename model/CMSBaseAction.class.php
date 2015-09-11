<?php
/**
 * description
 *
 * Filename: CMSBaseAction.class.php
 *
 * @author liyan
 * @since 2014 12 17
 */
abstract class CMSBaseAction extends XBaseAction {

    final public function execute() {

        if ($this->shouldSignin()) {
            //  check signin
            try {
                $user = $this->getSigninUserinfo();
                DAssert::assert($user instanceof MSimpleUser, 'illegal user, must be MSimpleUser');
            } catch (Exception $e) {
                $this->notSignin();
                return;
            }
        }

        if (!$this->checkPermission($user->getRid())) {
            $this->permissionDenied($user);
            return;
        }

        return $this->cmsAction($user);
    }

    protected function shouldSignin() {
        return true;
    }

    private function getSigninUserinfo() {
        $auth = LibSimpleUser::resolvePersistentAuth();
        if (!$auth) {
            throw new Exception("not signin", 1);
        }
        list($username, $md5password) = $auth;
        LibSimpleUser::persistentAuth($username, $md5password);

        return MSimpleUser::userFromUsernamePassword($username, $md5password);
    }

    private function checkPermission($rid) {
        $arrPagePms = $this->pagePermissions();
        if (empty($arrPagePms)) {
            //  if empty, allow all access
            return true;
        }

        $arrRolePms = $this->getRolePermissions($rid);
        foreach ($arrRolePms as $rolePms) {
            if (in_array($rolePms, $arrPagePms)) {
                return true;
            }
        }

        return false;
    }

    private function getRolePermissions($rid) {
        $role = new MRole($rid);
        return $role->getRolePermissions();
    }

    abstract protected function cmsAction(MSimpleUser $user);

    protected function notSignin() {
        MCookie::setCookie('signin_redirect', $_SERVER['REQUEST_URI'], null, '/');
        redirect(urlprefix('/signin'));
    }

    protected function permissionDenied(MSimpleUser $user) {
        die('permission deny!');
    }

    protected function pagePermissions() {
        return array();
    }

}
