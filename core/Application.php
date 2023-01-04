<?php

namespace app\core;

use app\core\Request;


/* 
@package namespace app\core
*/

class Application
{
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        #todo
        $this->router->resolve();
    }
}
