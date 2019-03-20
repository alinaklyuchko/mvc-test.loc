<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.03.19
 * Time: 9:57
 */
namespace Controllers;
use Controllers\Base\Controller;
use Services\Xmlloader;

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
        $loadXml = new Xmlloader('./upload/import.xml');
    }
}
