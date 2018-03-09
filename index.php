<?php
/**
 * Created by PhpStorm
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:14 AM
 */
use Controllers\RouterController;
use Controllers\TodoRoutes;
try{
    /**
     * @param $className
     */
    function autoloader($className)
    {
        $fileName = str_replace('\\', '/', $className).'.php';
        include __DIR__.'/app/'.$fileName;
    }
    spl_autoload_register('autoloader');
    $route = isset($_GET['route']) ? $_GET['route'] :'todo/home';

    /** @var TYPE_NAME $todoRouter */
    $todoRouter = new RouterController($route,$_SERVER['REQUEST_METHOD'],new TodoRoutes());
    $todoRouter->run();
    //uncomment for debugging purpose
    //print_r($_REQUEST);
    //print_r($_SERVER['REQUEST_METHOD']);

}catch (Exception $e)
{
    $title = 'An error has occured';
    $output = 'Database error: '.$e->getMessage().' in '.$e->getFile().' : '.$e->getLine();
}