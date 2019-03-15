<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.03.19
 * Time: 14:41
 */
namespace Model;

use System\Db;
use PDO;
use Exception\Http404Exception;

/**
 * Class DbTable
 * @package Model
 */
class DbTable {
    /**
     * @var string
     */
    public $table = '';
    /**
     * @var array
     */
    public $fields = [];
    /**
     * @var bool|null|PDO
     */
    public $conn;
    /**
     * DbTable constructor.
     * @param $table
     * @param $fields
     * @throws Http404Exception
     */
    public function __construct($table, $fields)
    {
        $this->table = $table;
        $this->fields = $fields;
        $conn = Db::getInstance();
        if (!is_null($conn))
        {
            return $this->conn = $conn;
        } else {
            throw new Http404Exception();
        }
    }
    /**
     * @param array $arr
     * @return array
     */
    public function select($arr = [])
    {
        if (array_key_exists('limit', $arr))
        {
            $limit = $arr['limit'];
        }
        else {
            $limit = 5;
        }
        if (array_key_exists('offset', $arr))
        {
            $offset = $arr['offset'];
        }
        else {
            $offset = 0;
        }
        if (array_key_exists('where', $arr))
        {
            $where = $arr['where'];
        }
        else {
            $sql = "SELECT * FROM $this->table LIMIT $limit OFFSET $offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        $sql = "SELECT * FROM $this->table WHERE $where LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }
    /**
     * @param array $arr
     * @return bool
     */
    public function insert($arr = [])
    {
        $newField ='';
        $newValue = '';
        foreach ($arr as $key => $value)
        {
            $key = '`'.$key.'`'.', ';
            $newField .= $key;
        }
        $newField = '`id`, '. trim($newField, '\, ');
        foreach ($arr as $key => $value)
        {
            $value = '\''.$value.'\''.', ';
            $newValue .= $value;
        }
        $newValue = 'null, '. trim($newValue, '\, ');
        $sql = "INSERT INTO $this->table($newField)
	              VALUES ($newValue)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    /**
     * @param array $arr
     * @param string $table2
     * @return array
     */
    public function selectByDepart($arr = [], $table2 = '')
    {
        if (array_key_exists('limit', $arr))
        {
            $limit = $arr['limit'];
        }
        else {
            $limit = 5;
        }
        if (array_key_exists('offset', $arr))
        {
            $offset = $arr['offset'];
        }
        else {
            $offset = 0;
        }
        if (array_key_exists('where', $arr))
        {
            $where = $arr['where'];
            $sql = "SELECT * FROM $this->table LEFT JOIN $table2 ON $this->table.department_id = $table2.id WHERE $where LIMIT $limit OFFSET $offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }
        elseif (!array_key_exists('where', $arr))
        {
            $sql = "SELECT * FROM $this->table LEFT JOIN $table2 ON $this->table.department_id = $table2.id LIMIT $limit OFFSET $offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_OBJ);
        }

    }
    /**
     * @param string $where
     * @return int
     */
    public function getCount($where = '')
    {
        if ($where == ''){
            $sql = "SELECT COUNT(*) FROM $this->table";
            return (int)($this->conn->query($sql)->fetchALL(PDO::FETCH_ASSOC))[0]["COUNT(*)"];
        }
        elseif ($where != '')
        {
            $w = $this->getDepartId($where);
            $sql = "SELECT COUNT(*) FROM $this->table WHERE department_id = $w";
            return (int)($this->conn->query($sql)->fetchALL(PDO::FETCH_ASSOC))[0]["COUNT(*)"];
        }
    }
    /**
     * @param $where
     * @return mixed
     */
    public function getDepartId($where)
    {
        $sql = "SELECT id FROM department WHERE $where";
        return $this->conn->query($sql)->fetchALL(PDO::FETCH_ASSOC)[0]['id'];
    }
}