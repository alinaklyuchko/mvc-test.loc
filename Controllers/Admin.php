<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 17:50
 */
namespace Controllers;

use Controllers\Base\Controller;

class Admin extends Controller
{
//    public function __construct()
//    {
//        echo 'yahoo';
//    }
    public function myfunc(array $args) {
        echo '!!!!';
        echo __CLASS__ . __METHOD__;
    }
}