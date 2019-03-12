<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 13:23
 */
namespace System;
use PDO;

/**
 * Class Db
 * @package System
 */
final class Db
{
    /**
     * @var null
     */
    private static $instance = null;
    /**
     * @return bool|null|PDO
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            $config = require_once 'Config.php';
            $host = $config['host'];
            $db_name = $config['db_name'];
            $user = $config['user'];
            $password = $config['password'];
            try
            {
                self::$instance = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=UTF8', $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$instance;
            } catch (\PDOException $e)
            {
                print "Error!: Something wrong" . $e->getMessage() . "<br/>";
                return false;
            }
        }
        return static::$instance;
    }
    /**
     * Db constructor.
     */
    private function __construct()
    {
    }
    /**
     * Db clone.
     */
    private function __clone()
    {
    }
    /**
     * Db wakeup
     */
    private function __wakeup()
    {
    }
}