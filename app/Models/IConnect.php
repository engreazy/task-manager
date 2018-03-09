<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:18 AM
 */
namespace Models;
Interface IConnect
{
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "todo";

    /**
     * @return mixed
     */
    public static function dbConnect();
}