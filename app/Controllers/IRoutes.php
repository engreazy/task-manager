<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:39 AM
 */
namespace Controllers;
Interface IRoutes
{
    public function getRoutes();
    public function getAuthenticator();
    public function checkPermission($permission);
}