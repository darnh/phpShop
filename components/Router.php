<?php

/**
 * Router class
 *  Component for working with routes
 */
class Router
{

    /**
     * Property for storing an array of roots
     * @var array
     */
    private $routes;

    /**
     * Designer
     */
    public function __construct()
    {
        // Path to the file with roots
        $routesPath = ROOT . '/config/routes.php';

        // Get roots from the file
        $this->routes = include($routesPath);
    }

    /**
     * Returns the query string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Method for processing the request
     */
    public function run()
    {
        // Get the query string
        $uri = $this->getURI();

        // Check if there is such a request in the route array (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // We're comparing $uriPattern and $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Get the inner path from the outer path according to the rule.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Define controller, action, parameters

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Connect the controller class file
                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Create an object, call the method (т.е. action)
                $controllerObject = new $controllerName;

                /* Call the required method ($actionName) from a certain
                 * class ($controllerObject) with specified ($parameters) parameters
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // If the controller method is called successfully, terminate the router operation
                if ($result != null) {
                    break;
                }
            }
        }
    }

}