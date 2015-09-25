<?php
/**
 * description
 *
 * Filename: CMSAjaxBaseAction.class.php
 *
 * @author liyan
 * @since 2014 12 18
 */
namespace Mod\SimpleCMS;

abstract class CMSAjaxBaseAction extends CMSBaseAction {

    final protected function cmsAction(MCMSUser $user) {
        $jsonRespond = $this->cmsAjaxAction($user);
        DAssert::assert($jsonRespond instanceof MJsonRespond, 'illegal json respond');

        $this->displayJson($jsonRespond);
    }

    abstract protected function cmsAjaxAction(MCMSUser $user);

}
