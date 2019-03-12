<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.03.19
 * Time: 9:55
 */
namespace Controllers;
use Controllers\Base\Controller;
use Model\DbTable;

class Employes extends Controller
{
    public function index(array $args)
    {
        $this->render();
//        var_dump($args);
        if ($args)
        {
            if (ctype_digit($args[0]))
            {
                echo ' number ';
            } elseif (!ctype_digit($args[0]))
            {
                $data2 = '';
//                $department = ;
                if ($args[0] == 'accounting'){
                    print('$data2 = $mod->selectByDepart(["where" => "department_name = accounting department"], "department");');
                }
            }
        }
    }
}