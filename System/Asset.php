<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.03.19
 * Time: 14:44
 */
namespace System;
/**
 * Class Asset
 * @package System
 */
class Asset
{
    /**
     * @return void
     */
    public static function getCss()
    {
        $arr = scandir('./css');
        foreach ($arr as $key => $value)
        {
            $filePath = "./css/". "$value";
            if (is_file($filePath))
            {
                echo "<link rel='stylesheet' href='.$filePath'>";
            }
        }
    }
    /**
     * @return void
     */
    public static function getJs()
    {
        $arr = scandir('./js');
        foreach ($arr as $key => $value)
        {
            $filePath = "./js/". "$value";
            if (is_file($filePath))
            {
                echo "<script src='.$filePath'></script>";
            }
        }
    }
}