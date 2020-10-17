<?php


namespace core;
require_once __DIR__.'../vendor/autoload.php';

class Router
{
    public static function buildRoute()
    {
        //контроллер по умолчанию
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";

        $route = explode("/", $_SERVER['REQUEST_URI']);
        //если URI не пустой, то определяем соотв. контроллер
        if($route[1] != '')
        {
            $controllerName = ucfirst($route[1]."Controller");
            $modelName = ucfirst($route[1]."Model");
        }
        if(isset($route[2]) && $route[2] != '')
        {
            $action = $route[2];
        }
        $controller = new $controllerName();
        $controller->$action();
    }

    public function errorPage()
    {

    }
}