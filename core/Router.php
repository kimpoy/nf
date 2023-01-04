<?php

namespace app\core;

use app\core\Request;



/* 
@package namespace app\core
*/

class Router
{

    #public $request = new Request();
    public Request $request;
    protected array $routes = [];


    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        //* get path and return callback
        //$this->routes[$path] = $callback;
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        /* 
        *get path / or /contact
        *get method  (get,post)
        */
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;


        if ($callback === false) {
            echo "Not Found!";
            exit;
        }

        if (is_string($callback)) {
            # code...
            return $this->renderView($callback);
        }

        return call_user_func($callback);
        #$this->request->getPath();
    }

    public function renderView($view)
    {
        # code...

        include_once Application::$ROOT_DIR . "/views/$view.php";
    }
}
