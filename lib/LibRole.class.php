<?php
/**
 * description
 *
 * Filename: LibRole.class.php
 *
 * @author liyan
 * @since 2016 12 6
 */
namespace Mod\SimpleCMS;

class LibRole {

    public static function addRolePermission($rolename, $pms) {
        DalSimpleCMSRole::beginTransaction();
        try {
            DalSimpleCMSRole::addRole($rolename);
            $rid = DalSimpleCMSRole::insertID();
            foreach ($pms as $pid) {
                DalSimpleCMSRolePermission::add($rid, $pid);
            }
        } catch (Exception $e) {
            DalSimpleCMSRole::rollback();
            return false;
        }
        DalSimpleCMSRole::commit();
        return true;
    }

}

