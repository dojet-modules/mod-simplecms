<?php
// use \Dispatcher;

Dispatcher::route('/^$/', SIMPLE_CMS_UI.'HomeAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signin$/', SIMPLE_CMS_UI.'sign/SigninAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signin\-commit$/', SIMPLE_CMS_UI.'sign/SigninCommitAction', 'Mod\\SimpleCMS\\');
Dispatcher::route('/^signout$/', SIMPLE_CMS_UI.'sign/SignoutAction', 'Mod\\SimpleCMS\\');
