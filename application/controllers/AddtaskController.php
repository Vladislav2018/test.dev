<?php


namespace application\controllers;

use application\models\AddtaskModel;
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
        else
        {
            $this->pageData['mode'] = 'user';
        }
        if(!empty($_POST))
        {
            $this->get_task();
        }
        $this->view->render($this->pageTemplate, $this->pageData);
    }

    public function admin_view($email)
    {
        $this->pageData['email'] = $email;
        $this->pageData['link'] = '/logout';
        $this->pageData['label'] = 'Log out';
        $this->pageData['mode'] = 'admin';
        $nick = $this->model->get_admin_nickname($_SESSION['email']);
        if (!empty($nick))
        {
            $this->pageData['nick'] = $nick;
        }
    }

    public function get_task()
    {
        $result =  $this->model->add_task($_POST['email'], $_POST['nick'], $_POST['task']);
        if($result == true)
        {
            $this->pageData['feedback'] = 'Task created successfully!';
        }
        else
        {
            $this->pageData['error'] = 'SendDataError';
        }
    }


}