<?php


class Router
{
    private array $routes;
    public static $_instance;
    public function __construct()
    {
        $this->routes = [
            "/" => "main.php",
            "/user/create" => "create.php",
            "/user/authorization" => "auth.php",
            "/user/{id}/view" => "view.php",
            "/user/{id}/update" => "update.php",
            "/user/{id}/delete" => "delete.php",

        ];
    }
    public static function getInstance() : Router
    {
        if(null === self::$_instance) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    public function parse()
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $file) {

            $match = true;
            $param = [];
            $routeParts = explode('/', $route);
            $uriParts = explode('/', $uri);

            foreach ($uriParts as $key => $uriPartName) {
                if (!isset($routeParts[$key])){
                    $match = false;
                    continue;
                }
                if (substr($routeParts[$key], 0, 1) == '{' && substr($routeParts[$key], -1, 1) == '}') {
                    $match = true;
                    $param[trim($routeParts[$key], '{}')] = $uriParts[$key];


                } elseif ($routeParts[$key] !== $uriParts[$key]) {
                    $match = false;

                }
            }
            if ($match)
            {

                require $file;
                break;
            }
        }
        die(404);
    }


}