<?php
require_once 'Autoloader.php';

class Bootstrap
{
    public static function init()
    {
        $BASE_PATH = realpath(dirname(__FILE__));
        set_include_path(get_include_path() . PATH_SEPARATOR . $BASE_PATH;
        spl_autoload_register('Autoloader::load');
    }
}

Bootstrap::init();
