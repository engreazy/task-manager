<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/30/2018
 * Time: 7:07 PM
 */
namespace Models;
abstract class DatabaseQuery
{
    protected  $dbc;

    /**
     * @param $sql
     * @param array $parameters
     * @return mixed
     */
    protected function query($sql, $parameters = [])
    {
        $this->dbc = DatabaseConnect::dbConnect();
        $result = $this->dbc->prepare($sql);
        $result->execute($parameters);
        return $result;
    }
}