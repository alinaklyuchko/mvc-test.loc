<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.03.19
 * Time: 17:35
 */
namespace System;
use Route\Route;
/**
 * Class App
 * @package System
 */
class App {
    /**
     * App constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return void
     */
    public static function init()
    {
        System::$db = Db::getInstance();
        System::globals();
    }
    public function run()
    {
        $route = new Route();
        $route->match();
//        var_dump($route);
        $route->start();
    }
}