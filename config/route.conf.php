<?php
// use \Dispatcher;

Dispatcher::route('/^$/', SIMPLE_CMS_UI.'HomeAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signin$/', SIMPLE_CMS_UI.'sign/SigninAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signin\-commit$/', SIMPLE_CMS_UI.'sign/SigninCommitAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signout$/', SIMPLE_CMS_UI.'sign/SignoutAction', 'Mod\\SimpleCMS\\');

Dispatcher::route('/^user\/list$/', SIMPLE_CMS_UI.'user/UserListAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^user\/add$/', SIMPLE_CMS_UI.'user/UserAddAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^user\/edit\/(?<uid>[^\/]*)$/', SIMPLE_CMS_UI.'user/UserEditAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^user\/commit$/', SIMPLE_CMS_UI.'user/UserCommitAction', 'Mod\\SimpleCMS\\');

Dispatcher::route('/^role\/list$/', SIMPLE_CMS_UI.'role/RoleListAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^role\/add$/', SIMPLE_CMS_UI.'role/RoleAddAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^role\/edit\/(?<rid>[^\/]*)$/', SIMPLE_CMS_UI.'role/RoleEditAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^role\/commit$/', SIMPLE_CMS_UI.'role/RoleCommitAction', 'Mod\\SimpleCMS\\');
