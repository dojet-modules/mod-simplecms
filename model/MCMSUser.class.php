<?php
/**
 * @author liyan
 * @since 2015 9 25
 */
namespace Mod\SimpleCMS;

class MCMSUser {

    protected $simpleUser;
    private $roleID;

    function __construct(MSimpleUser $simpleUser) {
        $this->simpleUser = $simpleUser;
    }

    public function roleID() {
        if (!$this->roleID) {
            $uid = $this->simpleUser->uid();
            $this->roleID = DalSimpleCMSUserRole::getUserRoleID($uid);
        }
        return $this->roleID;
    }

    public static function signout() {
        LibSimpleUser::removePersistentAuth();
    }

}