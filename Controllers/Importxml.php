<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.03.19
 * Time: 9:57
 */
namespace Controllers;
use Controllers\Base\Controller;
use Model\DbTable;

/**
 * Class Importxml
 * @package Controllers
 */
class Importxml extends Controller
{
    /**
     * @param array $args
     */
    public function import(array $args)
    {
        $this->render([]);
        $xml = simplexml_load_file('./upload/import.xml');
        $args = [];
        foreach ($xml as $item => $value)
        {
            $args[] = get_object_vars($value);
        }
        $countArgs = count($args);
        $argKeys = array_keys($args[0]);
        $fields =[];
        foreach ($argKeys as $key => $value)
        {
            $fields[$value] = '';
        }
        $mod = new DbTable('employes', $fields);
        for ($i = 0; $i < $countArgs; $i++){
            $mod->insert($args[$i]);
        }
    }
}
