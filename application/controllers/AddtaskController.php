<?php


namespace application\controllers;

use application\models\AddtaskModel;
use application\models\AuthModel;
use application\views\View;

class AddtaskController extends Controller
{
    private $pageTemplate = '/../views/addtask.tpl.php';
    public $pageData = array();
    public function __construct()
    {
        $this->pageData['Title'] = 'Add Task';
        $this->model = new AddtaskModel();
        $this->view = new View();
    }

    public function index()
    {
        if(isset($_SESSION['email']))
            $this->admin_view($_SESSION['email']);
        $this->view->render($this->pageTemplate, $this->pageData);
        if(!empty($_POST))
        {
            $this->get_task();
        }
    }

    public function admin_view($email)
    {
        $this->pageData['email'] = $email;
        $this->pageData['link'] = '/logout';
        $this->pageData['label'] = 'Log out';
        $this->pageData['mode'] = 'admin';
    }

    public function get_task()
    {
        $result =  $this->model->add_task($_POST['email'], $_POST['nick'], $_POST['task']);
        if($result == true)
        {
            header('Location: /');
        }
        else
        {
            $this->pageData['error'] = 'SendDataError';
        }
    }


}