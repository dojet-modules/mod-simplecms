<?php
/**
 * @author liyan
 * @since 2015 1 13
 */
abstract class CMSBlockDelegate {

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockWillModify(&$blockSubmitAction) {}

    /**
     * @param BlockSubmitAction $blockSubmitAction
     * @return MResult
     */
    public function blockShouldCommit(BlockSubmitAction &$blockSubmitAction) {
        return true;
    }

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockWillUpdate($blockSubmitAction) {}

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockDidUpdate($blockSubmitAction) {}

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockDidAdd($blockSubmitAction) {}

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockSubmitDidFinish($blockSubmitAction) {}

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function blockDidAbortSubmit($blockSubmitAction, $info) {
        printbr($info);
        print('<a href="javascript:history.back()">后退</a>');
    }

    /**
     * @param BlockSubmitAction $blockSubmitAction
     */
    public function getPreviewUrl($blockSubmitAction) {
        return 'http://www.zhuqu.com/preview/';
    }

}