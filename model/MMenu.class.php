<?php
/**
 * @author liyan
 * @since 2015 10 8
 */
namespace Mod\SimpleCMS;

class MMenu {

    protected $title;
    protected $link;
    protected $permissions = array();
    protected $submenu = array();

    protected static $root;

    function __construct($title, $link, $permissions) {
        $this->title = $title;
        $this->link = $link;
        $this->permissions = $permissions;
    }

    public static function root() {
        if (self::$root not instanceof MMenu) {
            $root = MMenu::menu(null);
        }
        return $root;
    }

    public static function menu($title, $link = '', $permissions = array()) {
        return new MMenu($title, $link, $permissions);
    }

    public function addSubmenu(MMenu $submenu) {
        $this->submenu[] = $submenu;
        return $this;
    }

    public function title() {
        return $this->title;
    }

    public function link() {
        return $this->link;
    }

    public function permissions() {
        return $this->permissions;
    }

    public function submenu() {
        return $this->submenu;
    }

}