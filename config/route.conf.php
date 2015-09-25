<?php
use \Dispatcher;

Dispatcher::addRoute('/^$/', SIMPLE_CMS_UI.'SimpleCMSHomeAction', 'Mod\\SimpleCMS\\');
