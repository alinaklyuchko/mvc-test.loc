<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.03.19
 * Time: 15:31
 */
namespace Services;
//use Model\DbTable;
//use Exception\Http404Exception;
class Pagination
{
    public static $allPage;
    public static $activePage;
    public static $count;

    public static function countPag($allPage, $activePage, $count)
    {
        self::$activePage = $activePage;
        var_dump(self::$activePage);
        self::$allPage = $allPage;
        var_dump(self::$allPage);
        self::$count = $count;
        var_dump(self::$count);
    }

    public static function renderPag()
    {
//        for ($i = 1; $i <= 5 & $i <= self::$allPage; $i++)
//        {
//           echo "<a href=#" . $i . "> Стр " . $i . "</a>";
//        }
//        echo "<a href= " . self::$activePage-2 . "> Стр " . self::$activePage-2 . "</a>";
//        echo "<a href= " . self::$activePage-1 . "> Стр " . self::$activePage-1 . "</a>";
//        echo "<a href= " . self::$activePage . "> Стр " . self::$activePage . "</a>";
//        echo "<a href= " . self::$activePage+1 . "> Стр " . self::$activePage+1 . "</a>";
//        echo "<a href= " . self::$activePage+2 . "> Стр " . self::$activePage+2 . "</a>";
        $url = $_SERVER['REQUEST_URI'];
        if (self::$activePage >= 1 && self::$activePage <=3)
        {
            for ($i = 1; $i <= 5 & $i <= self::$allPage; $i++)
            {
                echo "<a href=..$url" . $i . "> Стр " . $i . "</a>";
            }
        }
        elseif (3 < self::$activePage && self::$activePage < (self::$allPage - 3))
        {
            for ($i = (self::$activePage - 2); $i <= (self::$activePage + 2); $i++)
            {
                echo "<a href=..$url" . $i . "> Стр " . $i . "</a>";
            }
        }
        elseif ($activePage = (self::$allPage - 3))
        {
            for ($i = (self::$allPage - 5); $i <= self::$allPage; $i++)
            {
                echo "<a href=..$url" . $i . "> Стр " . $i . "</a>";
            }
        }
//        if (self::$activePage <= 3) {
//           for ($i = 1; $i <= 6 & $i <= self::$allPage; $i++)
//            {
//           echo "<a href=../sales/" . $i . "> Стр " . $i . "</a>";
//            }
//        }
//        elseif (3 < self::$activePage && self::$activePage < (self::$allPage - 3))
//        {
//            for ($i = (self::$activePage - 2); $i <= (self::$activePage + 3); $i++)
//            {
//                echo "<a href=../sales/" . $i . "> Стр " . $i . "</a>";
//            }
//        }
//        elseif ($activePage = (self::$allPage - 3))
//        {
//            for ($i = (self::$allPage - 5); $i <= self::$allPage; $i++)
//            {
//            echo "<a href=../" . $i . "> Стр " . $i . "</a>";
//            }
//        }
    }
}