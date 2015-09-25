<?php
/**
 * Homepage
 *
 * Filename: SigninAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2014 3 14
 */
namespace Mod\SimpleCMS;

use \XBaseAction;

class SigninAction extends XBaseAction {

    protected function templatePrefix($template) {
        return SIMPLE_CMS_TEMPLATE;
    }

    public function execute() {
        $this->displayTemplate('sign/signin.tpl.php');
    }

}
