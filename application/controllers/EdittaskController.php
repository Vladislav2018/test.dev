<?php


namespace application\controllers;
use application\models\EdittaskModel;
use application\views\View;
use http\Header;

class EdittaskController extends Controller
{
    private $pageTemplate = '/../views/edittask.tpl.php';
    public $pageData = array();
    public function __construct()
    {
        $this->pageData['Title'] = 'Add Task';
        $this->model = new EdittaskModel();
        $this->view = new View();
    }
    public function edit()
    {
        if($_SESSION['admin'] == false)
        {
            header('Location: /auth');
        }
        else
        {
            $this->load_task_info($_GET['id']);
            $this->view->render($this->pageTemplate, $this->pageData);
            if(!empty($_POST))
            {
                $this->edit_task($_GET['id'], $_POST['task']);
            }
        }
    }

    public function load_task_info($task_id)
    {
        $this->pageData['task_info'] =  $this->model->load_task_info($task_id);
    }
    public function edit_task($task_id,$post_data)
    {
       $result = $this->model->edit_task($task_id, $post_data);
       if($result != true)
       {
           $this->pageData['error'] = "Unsuccess update";
       }
       else
       {
           header('Location: /');
       }
    }

}