<?php


namespace application\controllers;


use application\models\AuthModel;
use application\models\IndexModel;
use application\views\View;

class AuthController extends Controller
{
    private $pageTemplate = '/views/admin_auth.tpl.php';
    public function __construct()
    {
        $this->model = new AuthModel();
        $this->model = new View();
    }
    public function checkPage()
    {
        $this->pageData['title'] = 'Auth';
        $this->view->render($this->pageTemplate, $this->pageData);

        if(!empty($_POST))
        {
            if(!$this->login())
            {
                $this->pageData['error'] = 'Incorrect login or password';
            }
        }
    }

    public function login()
    {
        if(!$this->model->checkAdmin())
        {
            return false;
        }
    }
}