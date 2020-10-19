<?php


namespace core;

class Router
{
    public static function buildRoute()
    {
        //контроллер по умолчанию
        $controllerName = "indexcontroller";
        $modelName = "indexmodel";
        $action = "index";

        $route = explode("/", $_SERVER['REQUEST_URI']);
        //если URI не пустой, то определяем соотв. контроллер
        if($route[1] != '')
        {
            $controllerName = $route[1]."controller";
            $modelName = $route[1]."model";
        }
        include '../application/controllers/'.$controllerName.'.php';
        include '../application/models/'.$modelName.'.php';
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