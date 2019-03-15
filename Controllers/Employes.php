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
    }
    public function part()
    {
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
    }
}
