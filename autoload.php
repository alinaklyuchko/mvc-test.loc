<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 10:33
 */

spl_autoload_register(function ($class)
{
    $class = str_replace('\\','/', trim($class, '\\'));
    if (file_exists($class .'.php'))
    {
        require_once $class . '.php';
    };
});