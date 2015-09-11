<?php
/**
 * @author liyan
 * @since 2015 6 17
 */
abstract class CMSKVListDelegate {

    abstract public function onGetList(CMSKVListBaseAction $commitAction, $ps, $pn);
    abstract public function onAdd(KVListCommitAction $commitAction);
    abstract public function onUpdate(KVListCommitAction $commitAction, $kvId);
    abstract public function onDelete(CMSKVListBaseAction $commitAction, $kvId);

    abstract public function onGetListCount(CMSKVListBaseAction $commitAction);

    public function getRecordKVKey($record) {
        return 0;
    }

    abstract public function getRecordId($record);

    public function revealRecord($record, $kvKey) {
        return $record;
    }

}