<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.03.19
 * Time: 15:31
 */
namespace Services;
use Exception\Http404Exception;

/**
 * Class Pagination
 * @package Services
 */
class Pagination
{
    /**
     * @param $params
     * @throws Http404Exception
     */
    public static function countPag($params)
    {
        echo '<pre>';
        $allPage = 0;
        $activePage = 1;
        if (key_exists('allPage', $params))
        {
            $allPage = $params['allPage'];
        }
        if (key_exists('activePage', $params))
        {
            $activePage = $params['activePage'];
        }
        echo '<pre>';

        $uri = $_SERVER['REQUEST_URI'];
        $arUri = explode('/', trim($uri, '/'));
        if (ctype_digit(end($arUri))) {
            array_pop($arUri);
        }
        $link = '/' . implode('/', $arUri) . '/';
             if ($activePage <=3)
            {

                for ($i = 1; $i <= 5; $i++)
                {
                    $links[] = $i;
                }
            }
            elseif ($activePage >3 && $activePage <= $allPage-2)
            {
                for ($i = $activePage-2; $i <= $activePage+2; $i++)
                {
                    $links[] = $i;
                }
            }
            elseif ($activePage > $allPage-2)
            {
                for ($i = $activePage-4; $i <= $allPage; $i++)
                {
                    $links[] = $i;
                }
            }
            if ($activePage > $allPage)
            {
                throw new Http404Exception();
            }
            static::renderPag($links, $link);
    }
    /**
     * @param $links
     * @param $href
     */
    public static function renderPag($links, $href){
//        echo '<div class="links">';
        foreach($links as $link)
        {
            echo "<a class='pag' data-url='mvc-tes.loc/employes' data-page='$link' href =". $href . $link .">" . "Стр " . $link. "</a>&nbsp;&nbsp;";
        }
//        echo '</div>';
    }
}