<?php
use \Dispatcher;

Dispatcher::addRoute('/^$/', SIMPLE_CMS_UI.'HomeAction', 'Mod\\SimpleCMS\\');
