<?php
/**
 * @author liyan
 * @since 2015 10 8
 */
namespace Mod\SimpleCMS;

class MMenu {

    protected $key;
    protected $title;
    protected $link;
    protected $permissions = array();
    protected $submenu = array();

    protected static $root;

    function __construct($id, $title, $link, $permissions) {
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->permissions = $permissions;
    }

    public static function menu($id, $title, $link = '', $permissions = array()) {
        return new MMenu($id, $title, $link, $permissions);
    }

    public static function root() {
        if (!(self::$root instanceof MMenu)) {
            self::$root = MMenu::menu('root', null);
        }
        return self::$root;
    }

    public static function setMenu(MMenu $submenu, $xpath = null) {
        $node = self::root();

        $key = strtok($xpath, '.');
        while (false !== $key) {
            $node = $node->submenu($key);
            \DAssert::assert($node instanceof MMenu, 'menu xpath error, '.$xpath);
            $key = strtok('.');
        }
        $node->addSubmenu($submenu);
    }

    public function addSubmenu(MMenu $menu) {
        $this->submenu[$menu->id()] = $menu;
    }

    public function id() {
        return $this->id;
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

    public function submenu($id = null) {
        if (is_null($id)) {
            return $this->submenu;
        }
        return $this->submenu[$id];
    }

    public function toArray() {
        $menu = array(
                    'title' => $this->title,
                    'link' => $this->link,
                    'permissions' => $this->permissions,
                );
        foreach ($this->submenu() as $id => $submenu) {
            $menu['submenu'][$id] = $submenu->toArray();
        }
        return $menu;
    }

}