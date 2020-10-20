<?php


namespace core;
use application\controllers;
use application\models;
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
            if(strstr($route[1], '?') == false)
            {
                $controllerName = ucfirst($route[1]. "Controller");
                $modelName = ucfirst($route[1]. "Model");
            }
            else
            {
                $controllerName = "IndexController";
                $modelName = "IndexModel";
                $action = "index";
                $_GET['page'] = stristr($route[1], '=');
            }
        }
        if(file_exists( __DIR__.'/../application/controllers/'.$controllerName.'.php'))
        {
            include __DIR__.'/../application/controllers/'.$controllerName.'.php';
            include __DIR__.'/../application/models/'.$modelName.'.php';
        }
        else
        {
            Router::errorPage();
        }

        if(isset($route[2]) && $route[2] != '')
        {
            $action = $route[2];
        }

        $controllerName = '\\application\\controllers\\'.$controllerName;
        $controller = new $controllerName();
        $controller->$action();
    }

    public static function errorPage()
    {
        header("HTTP/1.1 404 Not Found");
        die();
    }
}