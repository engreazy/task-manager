<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:25 AM
 */
namespace Models;
class DatabaseConnect implements  IConnect
{
    private static $server = IConnect::DB_HOST;
    private static $dbName = IConnect::DB_NAME;
    private static $dbUser = IConnect::DB_USER;
    private static $dbPass = IConnect::DB_PASS;
    private static $dbc;

    /**
     * @return PDO
     */
    public static function dbConnect()
    {
        // TODO: Implement dbConnect() method.
        try{
            $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
            self::$dbc = @new \PDO('mysql:host='.self::$server.';dbname='.self::$dbName.'', self::$dbUser,self::$dbPass,$pdo_options);
            return self::$dbc;
        }
        catch (PDOException $e)
        {
            echo "<strong>Database Connection Failed </strong>".$e->getMessage()."<br />";
            //uncomment for debugging purpose
            //echo "<strong>Line </strong>".$e->getLine()."<br />";
            // echo "<strong>File </strong>".$e->getFile()."<br />";
        }
    }
}