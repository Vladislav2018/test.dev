<?php


namespace application\controllers;
use application\views\View;
use application\models\IndexModel as IndexModel;
class IndexController extends \application\controllers\Controller
{
    private $pageTemplate = '/../views/main.tpl.php';
    public $pageData = array();
    public function __construct()
    {
        $this->pageData['page'] = 1;
        $_GET['page'] = $this->pageData['page'];
        $this->model = new IndexModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = 'All tasks';
        $this->checkAdmin($_SESSION['admin']);
        if(!isset($_GET['page_']))
            $_GET['page_'] = $_GET['page'];
        $this->loadtasks($_GET['page_']);
        if(!empty($_POST))
        {
            $this->action_data($_POST);
        }
        $this->view->render($this->pageTemplate, $this->pageData);
    }
    public function checkAdmin($sess_adm)
    {
        if($sess_adm == true)
        {
            $this->pageData['link'] = '/logout';
            $this->pageData['label'] = 'Log out';
        }
        else
        {
            $this->pageData['link'] = '/auth';
            $this->pageData['label'] = 'Admin';
        }

    }
    public function loadtasks($current_page_num)
    {
        $limit = 3;
        $start_string = ($current_page_num-1)*$limit;
        if(isset($_POST['sort']))
        {
            $_SESSION['sort'] = $_POST['sort'];
        }
        $this->pageData['tasks'] = $this->model->load_tasks($limit, $start_string, $_POST);
    }
    public function action_data($post)
    {
        $this->model->action_with_items($post);
        header("Refresh:0");
    }
}