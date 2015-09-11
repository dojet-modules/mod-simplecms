<?php
/**
 * description
 *
 * Filename: CMSPageBaseAction.class.php
 *
 * @author liyan
 * @since 2014 12 18
 */
abstract class CMSPageBaseAction extends CMSBaseAction {
    const FAILED = 'failed';
    const SUCCESS = 'success';
    const DEFAULT_PAGESIZE = 10;

    protected $page;
    protected $title;
    protected $params = array();
    protected $count = 9999;
    protected $pageSize = 9999;
    protected $pageNo = 0;
    protected $search = array();

    abstract protected function cmsPageAction(MCMSUser $user);
    abstract protected function topMenuKey();

    final protected function cmsAction(MCMSUser $user) {
        $this->cmsPageAction($user);
        $this->displayPage($user);
    }

    private function displayPage(MCMSUser $user) {
        $menuConf = Config::configForKeyPath('menu');
        $this->assign('top_menu', $menuConf);

        $menuKey = $this->topMenuKey();
        $leftMenu = $menuConf[$menuKey]['left'];

        $this->assign('left_menu', $leftMenu);

        $this->assign('menu_key', $menuKey);

        $this->assign('title', $this->title);
        $this->assign('page', $this->page);

        $this->assign('fullname', $user->getFullname());
        $this->assign('userid', $user->getUid());
        $this->assign('permissions', $user->getPermissions());

        $this->displayTemplate('framework.tpl.php');
    }

    protected function initPage($obj, $rawconds=array(), $count=false){
        if(empty($rawconds)){
            $rawconds = $this->search;
        }
        $pageNo = MRequest::get('pageNo');
        $this->pageNo = isset($pageNo) ? $pageNo : 1;
        $pageSize = MRequest::get('size');
        $this->pageSize = $pageSize ? $pageSize : self::DEFAULT_PAGESIZE;

        if($count === false){
            $this->count = $obj::getcount($rawconds);
        }
        else{
            $this->count = $count;
        }
        $pageObj = new Pagination($this->count);
        $pageObj->setPageSize($this->pageSize);
        $pageObj->setCurrent($this->pageNo);
        $pageObj->makePages();
        $this->assign('pagination', $pageObj);
    }

    //获取Dal类中的数据
    protected function getList($obj, $rawconds=array(), $orderBy = array()){
        if(new $obj instanceof BaseDalX){
            if(empty($rawconds)){
                $rawconds = $this->search;
            }
            $orderBy = isset($obj::$defaultOrderby) && !empty($obj::$defaultOrderby) ? $obj::$defaultOrderby : $orderBy;
            return $obj::getList($rawconds, $this->pageNo, $this->pageSize, $this->count, $orderBy);
        }
        else{
            return false;
        }
    }

    protected function checkParams(){
        foreach($this->params as $value){
            if(!isset($value)){
                return false;
            }
            else{
                if(!is_numeric($value) && $value == ''){
                    return false;
                }
            }
        }
        return true;
    }

    protected function trimParams(&$params){
        foreach($params as &$param){
            $param = trim($param);    
        }
    }

    protected function permissionDenied(MCMSUser $user) {
        $this->page = 'permissiondeny.tpl.php';
        $this->displayPage($user);
    }

    // protected function displayResultBox($title, $content, $link) {
    //     $this->assign('title', $title);
    //     $this->assign('content', $content);
    //     $this->assign('link', $link);
    //     $this->displayTemplate('result.tpl.php');
    // }

    protected function displayResultBox($title, $content, $link) {
        $this->assign('title', $title);
        $this->assign('content', $content);
        $this->assign('link', $link);
        $this->page = 'misc/result.tpl.php';
        $this->title = $title;
    }

}
