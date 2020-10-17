<?php


namespace core;
require_once __DIR__.'/../vendor/autoload.php';

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }
}