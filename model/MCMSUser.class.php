<?php
/**
 * @author liyan
 * @since 2015 9 25
 */
namespace Mod\SimpleCMS;

use Mod\SimpleUser\MSimpleUser;

class MCMSUser {

    protected $simpleUser;
    protected static $me;

    private $userinfo;

    function __construct(MSimpleUser $simpleUser) {
        $this->simpleUser = $simpleUser;
    }

    public static function userFromSimpleUser(MSimpleUser $simpleUser) {
        return new MCMSUser($simpleUser);
    }

    public function uid() {
        return $this->simpleUser->uid();
    }

    public static function me() {
        if (!self::$me) {
            $simpleUser = MSimpleUser::getSigninUser();
            self::$me = MCMSUser::userFromSimpleUser($simpleUser);
        }
        return self::$me;
    }

    public static function getSigninUser() {
        return self::me();
    }

    protected function getUserinfo() {
        if (!$this->userinfo) {
            $this->userinfo = DalSimpleCMSUserinfo::getUserinfo($this->uid());
        }
        return $this->userinfo;
    }

    public function roleID() {
        $userinfo = $this->getUserinfo();
        return $userinfo['rid'];
    }

    public function getFullname() {
        $userinfo = $this->getUserinfo();
        return $userinfo['fullname'];
    }

    public function getPermissions() {
        return array();
    }

    public function signout() {
        $this->simpleUser->signout();
    }

}