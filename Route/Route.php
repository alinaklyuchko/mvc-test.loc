<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 9:49
 */
namespace Route;

use Exception\Http404Exception;

/**
 * Class Route
 * @package Route
 */
class Route {

    /**
     * @var array
     */
    public $args = [];
    /**
     * @var string
     */
    public $action = 'index';
    /**
     * @var
     */
    public $controller;
    /**
     * @var string
     */
    protected $controllerFolder = 'Controllers';
    /**
     * @return void
     */
    public function match()
    {
        $controller = '';
        $action = '';
        $routs = explode('/', trim($_SERVER['REQUEST_URI'], "/?"));
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
        if (!empty($routs)) {
            $this->args = $routs;
        }
    }
    /**
     * @param $controller
     * @param $action
     * @param array $args
     * @throws Http404Exception
     */
    public function call($controller, $action, array $args)
    {
        $controller = $this->makeFullNameController($controller);
        if (is_callable([$controller, $action])) {
            $controller = new $controller($controller, $action);
            $controller->$action($args);
        } else {
            throw new Http404Exception();
        }
    }
    /**
     * @return void
     */
    public function start()
    {
        $this->call($this->controller, $this->action, $this->args);
    }
    /**
     * @param $controller
     * @return string
     */
    private function makeFullNameController($controller)
    {
        return $this->controllerFolder.'\\'.$controller;
    }

}