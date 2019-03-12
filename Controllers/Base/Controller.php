<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.03.19
 * Time: 15:42
 */
namespace Controllers\Base;

/**
 * Class Controller
 * @package Controllers\Base
 */
class Controller
{
    /**
     * @var
     */
    public $controller;
    /**
     * @var
     */
    public $action;
    /**
     * Controller constructor.
     * @param $controller
     * @param $action
     */
    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }
    /**
     * @param array $params
     * @param string $viewPath
     */
    public function render(array $params = [], $viewPath = '')
    {
        if (!$viewPath) {
            $viewPath = './Views/'. mb_strtolower($this->getViewDirectory($this->controller)) .'/'. $this->action .'.php';
        }
        if (file_exists($viewPath))
        {
            extract($params);
            require_once "$viewPath";
        }
    }
    /**
     * @param $controller
     * @return string
     */
    private function getViewDirectory($controller)
    {
        $controller = trim(stristr($controller, '\\'), '\\');
        return $controller;
    }

}