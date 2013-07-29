<?php

class Autoloader
{
    static function load($class)
    {
        $basePath = realpath(dirname(__FILE__)) . '/';
        $classPath = implode(DIRECTORY_SEPARATOR, explode('_', $class)) . '.php';
        $filePath = $basePath . $classPath;

        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }
}
