<?php


namespace application\controllers;


use application\models\AuthModel;
use application\views\View;

class AuthController extends Controller
{
    private $pageTemplate = '/../views/admin_auth.tpl.php';
    public function __construct()
    {
        $this->model = new AuthModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->checkPage();
    }

    public function checkPage()
    {
        if(empty($_POST))
        {
            $this->pageData['title'] = 'Auth';
            $this->view->render($this->pageTemplate, $this->pageData);
        }
        else
        {
            if(!$this->login())
            {
                $this->pageData['error'] = 'Incorrect login or password';
                $this->pageData['title'] = 'Incorrect';
                $this->view->render($this->pageTemplate, $this->pageData);
            }
            else
            {
                $_SESSION['admin'] = true;
                $_SESSION['email'] = $_POST['mail'];
                header("Location: /");
            }
        }
    }

    public function login()
    {
        if(!$this->model->checkAdmin($_POST['mail'], $_POST['pass']))
            return false;
        //echo 'u are admin';
        return true;
    }
}