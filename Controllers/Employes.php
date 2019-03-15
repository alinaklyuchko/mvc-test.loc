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
use Services\Pagination;

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
        $mod = new DbTable('employes', ['id' => '', 'name' => '', 'department_id' => '']);
        if (empty($args))
        {
            $data = $mod->selectByDepart(['limit' => 20], 'department');
            $params['data'] = $data;
            $count = $mod->getCount();
            $allPage = ceil($count / $limit);
            Pagination::countPag($allPage, $activePage, $count);

//            for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//            {
//                echo "<a href=../employes/" . $i . "> Стр " . $i . "</a>";
//            }
//            if ($activePage >= 1 & $activePage < $allPage)
//            {
//                echo "<p><a href=../employes/" . ++$activePage . ">Вперед</a></p>";
//            }
        }
        elseif ($args)
        {
            if (ctype_digit($args[0]))
            {
                $activePage = $args[0];
                $offset = ($limit * $activePage) - $limit;
                $count = $mod->getCount();
                $allPage = ceil($count / $limit);
                Pagination::countPag($allPage, $activePage, $count);
//                if ($activePage > $allPage)
//                {
//                    throw new Http404Exception();
//                }
                $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset], 'department');
                $params['data'] = $data;

//                if ($activePage <= 3)
//                {
//                    for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//                    {
//                        echo "<a href=../employes/" . $i . "> Стр " . $i . "</a>";
//                    }
//                }
//                elseif (3 < $activePage && $activePage < ($allPage - 3))
//                {
//                    for ($i = ($activePage - 2); $i <= ($activePage + 3); $i++)
//                    {
//                        echo "<a href=../employes/" . $i . "> Стр " . $i . "</a>";
//                    }
//                }
//                elseif ($activePage = ($allPage - 3))
//                {
//                    for ($i = ($allPage - 5); $i <= $allPage; $i++)
//                    {
//                        echo "<a href=../employes/" . $i . "> Стр " . $i . "</a>";
//                    }
//                }
//                echo "<p><a href=../employes/" . ++$activePage . ">  Вперед  </a></p>";
//                var_dump(111);
//                var_dump($activePage);
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
                        Pagination::countPag($allPage, $activePage, $count);
//                        for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//                        {
//                            echo "<a href=../employes/accounting/" . $i . "> Стр " . $i . "</a>";
//                        }
                    }
                    elseif ($args[1])
                    {
                        if (ctype_digit($args[1]))
                        {
                            $activePage = $args[1];
                            $offset = ($limit * $activePage) - $limit;
                            $count = $mod->getCount($where);
                            $allPage = ceil($count / $limit);
                            Pagination::countPag($allPage, $activePage, $count);
                            if ($activePage > $allPage)
                            {
                                throw new Http404Exception();
                            }
                            $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset, 'where' => $where], 'department');
                            $params['data'] = $data;
//                            if ($activePage <= 3)
//                            {
//                                for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//                                {
//                                    echo "<a href=../accounting/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            elseif (3 < $activePage && $activePage < ($allPage - 3))
//                            {
//                                for ($i = ($activePage - 2); $i <= ($activePage + 3); $i++)
//                                {
//                                    echo "<a href=../accounting/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            elseif ($activePage = ($allPage - 3))
//                            {
//                                for ($i = ($allPage - 5); $i <= $allPage; $i++)
//                                {
//                                    echo "<a href=../accounting/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            echo "<a href=../accounting/" . ++$activePage . ">Вперед</a>";
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
                        Pagination::countPag($allPage, $activePage, $count);
//                        for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//                        {
//                            echo "<a href=../employes/sales/" . $i . "> Стр " . $i . "</a>";
//                        }
//                        echo "<a href=../employes/" . ++$activePage . ">Вперед</a>";
                    }
                    elseif ($args[1])
                    {
                        if (ctype_digit($args[1]))
                        {
                            $activePage = $args[1];
                            $offset = ($limit * $activePage) - $limit;
                            $count = $mod->getCount($where);
                            $allPage = ceil($count / $limit);
                            Pagination::countPag($allPage, $activePage, $count);
                            if ($activePage > $allPage)
                            {
                                throw new Http404Exception();
                            }
                            $data = $mod->selectByDepart(['limit' => $limit, 'offset' => $offset, 'where' => $where], 'department');
                            $params['data'] = $data;
//                            if ($activePage <= 3) {
//                                for ($i = 1; $i <= 6 & $i <= $allPage; $i++)
//                                {
//                                    echo "<a href=../sales/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            elseif (3 < $activePage && $activePage < ($allPage - 3))
//                            {
//                                for ($i = ($activePage - 2); $i <= ($activePage + 3); $i++)
//                                {
//                                    echo "<a href=../sales/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            elseif ($activePage = ($allPage - 3))
//                            {
//                                for ($i = ($allPage - 5); $i <= $allPage; $i++)
//                                {
//                                    echo "<a href=../sales/" . $i . "> Стр " . $i . "</a>";
//                                }
//                            }
//                            if ($activePage <= $allPage)
//                            {
//                                echo "<a href=../employes/" . ++$activePage . ">Вперед</a>";
//                            }
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
        $this->render($params);
    }
}
