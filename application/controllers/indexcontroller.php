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
        $this->loadtasks($_GET['page_']);
        $this->view->render($this->pageTemplate, $this->pageData);
    }
    public function checkAdmin($sess_adm)
    {
        if($sess_adm == true)
        {
            $this->pageData['link'] = '/logout';
            $this->pageData['label'] = 'Log out';
            $this->pageData['mode'] = 'admin';
        }
        else
        {
            $this->pageData['link'] = '/auth';
            $this->pageData['label'] = 'Admin';
            $this->pageData['mode'] = 'user';
        }

    }
    public function loadtasks($current_page_num)
    {
        $limit = 3;
        $start_string = ($current_page_num-1)*$limit;
        $this->pageData['tasks'] = $this->model->load_tasks($limit, $start_string);
    }
}