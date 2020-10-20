<?php


namespace application\controllers;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->index();
    }
    public function index()
    {
        $_SESSION['admin'] = false;
        $_SESSION['email'] = '';
        header('Location: /');
    }
}