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
use Exception\Http404Exception;
use System\System;
use Twig;

/**
 * Class Employes
 * @package Controllers
 */
class Employes extends Controller
{
    /**
     * @param array $args
     * @throws Http404Exception
     */
    public function index(array $args)
    {
        $this->render();
        exit();
        $params = [];
        $limit = 20;
        $offset = 0;
        $activePage = 1;
        $allPage = 0;
        $mod = new DbTable('employes', ['id' => '', 'name' => '', 'department_id' => '']);
        if (empty($args))
        {
            $data = $mod->selectByDepart(['limit' => 20], 'department');
            $params['data'] = $data;
            $count = $mod->getCount();
            $allPage = ceil($count / $limit);
        }
        elseif ($args)
        {
            if (ctype_digit($args[0]))
            {
                $activePage = $args[0];
                $offset = ($limit * $activePage) - $limit;
                $count = $mod->getCount();
                $allPage = ceil($count / $limit);
                $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset], 'department');
                $params['data'] = $data;
            }
            elseif (!ctype_digit($args[0]))
            {
                if ($args[0] == 'accounting')
                {
                    $where = "department_name = 'accounting department'";
                    $data = $mod->selectByDepart(['limit' => $limit, 'where' => $where], 'department');
                    echo '<h3>Accounting</h3>';
                    $params['department'] = 'accounting';
                    if (empty($args[1]))
                    {
                        $params['data'] = $data;
                        $count = $mod->getCount();
                        $allPage = ceil($count / $limit);
                    }
                    elseif ($args[1])
                    {
                        if (ctype_digit($args[1]))
                        {
                            $activePage = $args[1];
                            $offset = ($limit * $activePage) - $limit;
                            $count = $mod->getCount($where);
                            $allPage = ceil($count / $limit);
                            $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset, 'where' => $where], 'department');
                            $params['data'] = $data;
                        }
                        elseif (!ctype_digit($args[1]))
                        {
                            throw new Http404Exception();
                        }
                    }
                }
                elseif ($args[0] == 'sales')
                {
                    $where = "department_name = 'sales department'";
                    $data = $mod->selectByDepart(['limit' => $limit, 'where' => $where], 'department');
                    echo '<h3>Department</h3>';
                    $params['department'] = 'sales';
                    if (empty($args[1]))
                    {
                        $params['data'] = $data;
                        $count = $mod->getCount();
                        $allPage = ceil($count / $limit);
                    }
                    elseif ($args[1])
                    {
                        if (ctype_digit($args[1]))
                        {
                            $activePage = $args[1];
                            $offset = ($limit * $activePage) - $limit;
                            $count = $mod->getCount($where);
                            $allPage = ceil($count / $limit);
                            $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset, 'where' => $where], 'department');
                            $params['data'] = $data;
                        }
                        elseif (!ctype_digit($args[1]))
                        {
                            throw new Http404Exception();
                        }
                    }
                }
                else
                {
                    throw new Http404Exception();
                }
            }
        }
        $params['allPage'] = (int)$allPage;
        $params['activePage'] = $activePage;
        $this->render($params);
//        echo '<pre>';
//        var_dump($data);
//        $newArr = [];
//       foreach ($data as $key => $v)
//       {
////           var_dump($v);
//          foreach ($v as $k => $i)
//          {
//                $newArr[] = $k;
//
////              var_dump($i);
//          }
//       }
//       foreach ($newArr as $k => $v)
//       {
////           var_dump($k);
//           $newArr[$k] = $v;
//       }
//       var_dump($newArr);
//        $this->render($params);
//        var_dump($params);
//        $this->render();
//        $loader = new \Twig\Loader\ArrayLoader([
//            'index.php' => '{{ data }}',
//            'base.html' => "{% extends 'base.html' %}"
//        ]);
//        $twig = new \Twig\Environment($loader);

//        echo $twig->render('index.php', $params['data']);
//        echo $twig->render('index.php', $params['data']);

//        var_dump($twig->render('index'));
//        echo $this->render('index.php', ['data' => $params]);

//        $this->render();
//        $twig = new Twig\Loader\ArrayLoader($loader);
//        $template = $twig->loadTemplate('index.php');
//        echo $template->render(['data' => $params['data']]);
    }
    /**
     * @throws Http404Exception
     */
    public function part()
    {
        $activePage = System::$post['page'];
        $params = [];
        $limit = 20;
        $offset = 0;
        $allPage = 0;
        $mod = new DbTable('employes', ['id' => '', 'name' => '', 'department_id' => '']);
        if (empty($activePage))
        {
            $data = $mod->selectByDepart(['limit' => 20], 'department');
            $params['data'] = $data;
            $count = $mod->getCount();
            $allPage = ceil($count / $limit);
        }
        elseif (!empty($activePage))
        {
            if (ctype_digit($activePage))
            {
                $offset = ($limit * $activePage) - $limit;
                $count = $mod->getCount();
                $allPage = ceil($count / $limit);
                $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset], 'department');
                $params['data'] = $data;
            }
            elseif (!ctype_digit($activePage))
            {
               throw new Http404Exception();
            }
        }
        $params['allPage'] = (int)$allPage;
        $params['activePage'] = $activePage;
//        $this->render($params);
//        $this->render();
//        $loader = new \Twig\Loader\ArrayLoader($params);
//        $twig = new \Twig\Environment($loader);
//        $twig->render('data');
        $this->render();
        $loader = new \Twig\Loader\ArrayLoader([
            'part.php' => '{{ data }}'
        ]);
        $twig = new \Twig\Environment($loader);
//        var_dump($params['data']);
        echo $twig->render('part.php', $params['data']);
//        var_dump($twig->render('index', ['data' => $params['data']]));

//        $loader2 = new \Twig\Loader\ArrayLoader([
//            'index.php' => '{% extends "part.php" %}{% block content %}Hello {{ name }}{% endblock %}',
//
//        ]);
//
//        $loader = new \Twig\Loader\ChainLoader([$loader2]);
//
//        $twig = new \Twig\Environment($loader);
    }
}
