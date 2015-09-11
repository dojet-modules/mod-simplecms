<?php
use Dojet\Dispatcher;

Dispatcher::addRoute('/^$/', SIMPLE_CMS_UI.'\\Mod\\SimpleCMS\\SimpleCMSHomeAction');
