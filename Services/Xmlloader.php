<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.03.19
 * Time: 9:56
 */
namespace Services;
use Model\DbTable;

/**
 * Class Xmlloader
 * @package Services
 */
class Xmlloader
{
    /**
     * @var int
     */
    public $resStr = 0;
    /**
     * @var int
     */
    public $resErrors = 0;

    /**
     * Xmlloader constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $xml = simplexml_load_file($file);
        $args = [];
        foreach ($xml as $item => $value)
        {
            $args[] = get_object_vars($value);
        }
        $countArgs = count($args);
        $argKeys = array_keys($args[0]);
        $fields =[];
        foreach ($argKeys as $key => $value)
        {
            $fields[$value] = '';
        }
        $mod = new DbTable('employes', $fields);
        for ($i = 0; $i < $countArgs; $i++){
            $res = $mod->insert($args[$i]);
            if ($res)
            {
                $this->resStr++;
            } elseif (!$res)
            {
                $this->resErrors++;
            }
        }
        if ($this->resStr > 0)
        {
            echo "Добавлено $this->resStr строк";
        }
        if ($this->resErrors > 0)
        {
            echo "Не добавлено $this->resErrors строк - ошибки";
        }
    }
}