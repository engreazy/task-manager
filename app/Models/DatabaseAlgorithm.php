<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/17/2018
 * Time: 2:12 PM
 */
namespace Models;
class DatabaseAlgorithm extends DatabaseQuery
{
    private $tableName;
    private $id;
    private $className;
    private $constructorArgs;

    /**
     * DatabaseAlgorithm constructor.
     * @param $tableName
     * @param $id
     * @param string $className
     * @param array $constructorArgs
     */
    public function __construct($tableName, $id, $className='\stdClass', Array $constructorArgs = [])
    {
        $this->tableName = $tableName;
        $this->id = $id;
        $this->className = $className;
        $this->constructorArgs = $constructorArgs;
    }

    /**
     * @return mixed
     */
    public function total()
    {
        $query = $this->query('SELECT COUNT(*) FROM`' . $this->tableName . '`');
        $row = $query->fetch();
        return $row[0];
    }

    /**
     * @param array $data
     * @internal param $tableName
     */
    public function dataEntry(Array $data)
    {
        // TODO: Implement dataEntry() method.
        $sql = 'INSERT INTO `' . $this->tableName . '` (';
        foreach ($data as $key => $value) {
            if ($key =='date') {
                $data[$key] = date("Y/m/d");
            }
            $sql .= '`' . $key . '`,';
        }
        $sql = rtrim($sql, ',');
        $sql .= ') VALUES (';

        foreach ($data as $key => $value) {
            $sql .= ':' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ')';
        $this->query($sql,$data);
        return $this->dbc->lastInsertId();

    }

    /**
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function displayData($orderBy = null, $limit = null, $offset = null)
    {
        $sql = "SELECT *
            FROM $this->tableName";

        if ($orderBy !== null){
            $sql .=' ORDER BY '.$orderBy;
        }
        if ($limit !== null)
        {
            $sql .=' LIMIT '.$limit;
        }
        if ($offset !== null)
        {
            $sql .=' OFFSET '.$offset;
        }
        $result = $this->query($sql);
        return $result->fetchAll(\PDO::FETCH_CLASS,$this->className,$this->constructorArgs);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findDataById(Array $data)
    {
        $parameters = [':id'=> $data];
        $sql = "SELECT *
            FROM $this->tableName
            WHERE id =:id";
        $result = $this->query($sql,$parameters[':id']);
        return $result->fetchObject($this->className,$this->constructorArgs);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findData(Array $data,$orderBy = null,$limit = null,$offset = null)
    {
        // TODO: Implement findData() method.
        $column = $data[0];
        $value = $data[1];

        $parameters = [':value'=>$value];
        $sql = "SELECT *
            FROM $this->tableName
            WHERE $column = :value";

        if ($orderBy !== null) {
            $sql .=' ORDER BY '.$orderBy;
        }
        if ($limit !== null)
        {
            $sql .=' LIMIT '.$limit;
        }
        if ($offset !== null)
        {
            $sql .=' OFFSET '.$offset;
        }
        $result = $this->query($sql,$parameters);
        return $result->fetchAll(\PDO::FETCH_CLASS,$this->className,$this->constructorArgs);
    }

    /**
     * @param array $data
     */
    public function removeData(Array $data)
    {
        // TODO: Implement removeData() method.
        $parameters = ['id'=> $data];

        $sql = "DELETE FROM $this->tableName WHERE id = :id";
        $this->query($sql,$parameters['id']);
    }

    /**
     * @param array $data
     */
    public function updateData(Array $data)
    {
        // TODO: Implement updateData() method.
        $sql = ' UPDATE `' . $this->tableName . '` SET ';

        foreach ($data as $key => $value) {
            $sql .= '`' . $key . '` = :' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ' WHERE id ='.$data['id'];

        $this->query($sql,$data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveData($data)
    {
        if (!$data['id']) {
            $data['id'] = null;
            $this->dataEntry($data);
        }else{
            $this->updateData($data);
        }
    }
}