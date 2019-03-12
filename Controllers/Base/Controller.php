<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 15:42
 */
namespace Controllers\Base;
use Views\View;

class Controller
{
//    public function __construct()
//    {
//        echo 'njdnjgj';
//    }
    public function render($viewPath = '', array $params = [])
    {
//        $view = new View();
        require_once "$viewPath";


//        var_dump($params);
    }
    public function index()
    {

    }
}