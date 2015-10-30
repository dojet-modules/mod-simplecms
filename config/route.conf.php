<?php
use \Dispatcher;

Dispatcher::addRoute('/^$/', SIMPLE_CMS_UI.'HomeAction', 'Mod\\SimpleCMS\\');
Dispatcher::addRoute('/^signin$/', SIMPLE_CMS_UI.'sign/SigninAction', 'Mod\\SimpleCMS\\');
Dispatcher::addRoute('/^signin\-commit$/', SIMPLE_CMS_UI.'sign/SigninCommitAction', 'Mod\\SimpleCMS\\');
Dispatcher::addRoute('/^signout$/', SIMPLE_CMS_UI.'sign/SignoutAction', 'Mod\\SimpleCMS\\');
