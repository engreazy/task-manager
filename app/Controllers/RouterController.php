<?php
/**
 * Created by PhpStorm.
 * User: engr easy
 * Date: 1/29/2018
 * Time: 3:40 AM
 */
namespace Controllers;

class RouterController
{
    private $route;
    private $method;
    private $routes;

    /**
     * RouterController constructor.
     * @param $route
     * @param $method
     * @param RouterController|TodoRoutes $routes
     */
    public function __construct($route, $method, TodoRoutes $routes)
    {
        $this->route = $route;
        $this->method = $method;
        $this->routes = $routes;
        $this->checkUrl();
    }

    /**
     *
     */
    private function checkUrl()
    {
        if ($this->route !== strtolower($this->route))
        {
            http_response_code(301);
            header('location:'.strtolower($this->route));
        }
    }

    /**
     * @param $viewFileName
     * @param array $variables
     * @return string
     */
    private function renderView($viewFileName, $variables = [])
    {
        extract($variables);
        ob_start();
        /** @noinspection PhpIncludeInspection */
        include __DIR__ . '/../views/'.$viewFileName;
        return ob_get_clean();
    }

    /**
     *
     */
    public function run()
    {
        $routes = $this->routes->getRoutes();
        $authenticator = $this->routes->getAuthenticator();
        if (isset($routes[$this->route]['login'])  && !$authenticator->checkAccess()){
            header('location:?route=login/error');
        }
        elseif (isset($routes[$this->route]['permissions']) && !$this->routes->checkPermission($routes[$this->route]['permissions']))
        {
            header('location:?route=login/error');
        }
        else{
            $controller = $routes[$this->route][$this->method]['controller'];
            /** @var TYPE_NAME $routes */
            $action = $routes[$this->route][$this->method]['action'];
            $page = $controller->$action();
            $title = $page['title'];
            $output = isset($page['variables']) ? $this->renderView($page['template'], $page['variables']) : $this->renderView($page['template']);
            echo $this->renderView('layout.html.php',['loggedIn'=>$authenticator->checkAccess(),
                'output'=>$output, 'title'=>$title]);
        }

    }
}
