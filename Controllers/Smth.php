<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.03.19
 * Time: 11:49
 */
namespace Controllers;

use Controllers\Base\Controller;

/**
 * Class Smth
 * @package Controllers
 */
class Smth extends Controller
{
    /**
     * @param array $args
     */
    public function jump(array $args){
        $this->render([
            'list' => ['dshgjf','dfjgkjj']
        ]);
    }
}