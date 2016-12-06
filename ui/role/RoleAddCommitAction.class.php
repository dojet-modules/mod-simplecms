<?php
/**
 * Homepage
 *
 * Filename: RoleAddCommitAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

use \MRequest;
use \DAssert;

class RoleAddCommitAction extends CMSBaseAction {

    protected function cmsAction(MCMSUser $user) {
        $pids = MRequest::post('pids');
        $rolename = MRequest::post('rolename');
        DAssert::assertArray($pids, 'illegal permissions');
        DalSimpleCMSRole::addRole($rolename, json_encode($pids));
        redirect('/role/list');
    }

    protected function pagePermissions() {
        return array();
    }

}
