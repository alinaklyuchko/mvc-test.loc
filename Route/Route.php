<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 9:49
 */
namespace Route;
use Controllers;


/**
 * Class Route
 * @package Route
 */
class Route {

    public $args;
    public $action = 'index';
    public $controller;
    protected $controllerFolder = 'Controllers';
    /**
     * Route constructor.
     */
//    public function __construct()
//    {
//
//    }
    public function match()
    {
        $controller = '';
        $action = '';
        $routs = explode('/', trim($_SERVER['REQUEST_URI'], "/?"));
        echo '$routs ';
        var_dump($routs);
        // controller
        if (!empty($routs[0])){
            $controller = ucfirst($routs[0]);
        }
        if (class_exists($this->makeFullNameController($controller)))
        {
            $this->controller = $controller;
            array_shift($routs);
        } else {
            $this->controller = 'Index';
        }
        echo ' controller ';
        var_dump($this->controller);
        //action
        if (!empty($routs[0])){
            $action = $routs[0];
        }
        if (method_exists($this->makeFullNameController($controller), $action))
        {
            $this->action = $action;
            array_shift($routs);
        } else {
            $this->action = 'index';
        }
        echo 'action ';
        var_dump($this->action);
        $this->args = $routs;
        echo 'args ';
        var_dump($this->args);
    }
    public function call($controller, $action, array $args)
    {
        $controller = $this->makeFullNameController($controller);
        if (is_callable([$controller, $action])) {
            $controller = new $controller;
            $controller->$action($args);
        }
    }
    public function start()
    {
        $this->call($this->controller, $this->action, $this->args);
    }
    private function makeFullNameController($controller)
    {
        return $this->controllerFolder.'\\'.$controller;
    }
}