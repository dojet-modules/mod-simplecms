<?php
/**
 * Homepage
 *
 * Filename: RoleCommitAction.class.php
 *
 * @author liyan
 * @since 2016 12 5
 */
namespace Mod\SimpleCMS;

use \MRequest;
use \DAssert;

class RoleCommitAction extends CMSBaseAction {

    protected function cmsAction(MCMSUser $user) {
        $rid = MRequest::post('rid');
        $pids = MRequest::post('pids');
        $rolename = MRequest::post('rolename');
        DAssert::assertArray($pids, 'illegal permissions');
        if ($rid) {
            // edit
            DalSimpleCMSRole::updateRole($rid, $rolename, json_encode($pids));
        } else {
            // add
            DalSimpleCMSRole::addRole($rolename, json_encode($pids));
        }
        redirect('/role/list');
    }

    protected function pagePermissions() {
        return array();
    }

}
