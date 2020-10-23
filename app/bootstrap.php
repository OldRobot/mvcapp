<?php
//load config 
require_once 'config/config.php';

//auto load core Libraries
//library files must match the class names
spl_autoload_register(function($classname){
    require_once 'Libraries/' . $classname . '.php';
});