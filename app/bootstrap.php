<?php
//load config 
require_once 'config/config.php';
//load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

//auto load core Libraries
//library files must match the class names
spl_autoload_register(function($classname){
    require_once 'Libraries/' . $classname . '.php';
});