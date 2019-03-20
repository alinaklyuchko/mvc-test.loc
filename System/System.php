<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.03.19
 * Time: 17:41
 */
namespace System;

/**
 * Class System
 * @package System
 */
class System {
    /**
     * @var \PDO
     */
    public static $db ;
    /**
     * @var array
     */
    public static $post;
    /**
     * @var array
     */
    public static $get;
    /**
     * @var array
     */
    private static $settings = [

    ];
    /**
     * @param $key string
     * @param $value mixed
     */
    static function setSettings($key, $value)
    {
        static::$settings[$key] = $value;
    }
    /**
     * @param $key string
     * @return mixed
     */
    static function getSettings($key)
    {
        return static::$settings[$key];
    }
    /**
     * @return void
     */
    public static function globals()
    {
        if ($_GET)
        {
            self::$get = $_GET;
        }
        if ($_POST)
        {
            self::$post = $_POST;
        }
    }
}
