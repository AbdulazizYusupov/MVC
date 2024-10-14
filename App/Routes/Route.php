<?php

namespace App\Routes;

class Route
{
    public $request;
    public static array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function get($path, $action)
    {
        self::$routes['get'][$path] = $action;
    }

    public static function post($path, $action)
    {
        self::$routes['post'][$path] = $action;
    }

    public function action()
    {
        $path = $this->request->url();
        $method = $this->request->method();

        $action = self::$routes[$method][$path] ?? false;
        // dd($action);    
        if ($action == false) {
            echo "404 not found: " . $path;
        }

        if (is_array($action)) {
            // dd(new $action[0]);
            $controller = new $action[0]();
            $controller->{$action[1]}();
        }
    }
}