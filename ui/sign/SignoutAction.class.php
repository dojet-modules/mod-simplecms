<?php
/**
 * Filename: SignoutAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2014 12 18
 */
class SignoutAction extends CMSBaseAction {

    protected function cmsAction(MCMSUser $user) {

        LibCMSUser::removePersistentAuth();

        MLog::writeQuery(LOG_MOD_SIGN, '登出');

        redirect(urlprefix('/signin'));
    }

}
