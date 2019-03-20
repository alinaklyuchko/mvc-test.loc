<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 17:50
 */
namespace Controllers;

use Controllers\Base\Controller;
use Exception\Http404Exception;

/**
 * Class Admin
 * @package Controllers
 */
class Admin extends Controller
{
    /**
     * @param array $args
     */
    public function myfunc(array $args) {

        $this->render([]);
    }

    /**
     * @param array $args
     * @throws Http404Exception
     */
    public function index(array $args)
    {

        throw new Http404Exception();
    }
}