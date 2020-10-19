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
        $this->model = new IndexModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = 'All tasks';
        $this->checkAdmin($_SESSION['admin']);
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
        $this->view->render($this->pageTemplate, $this->pageData);
        //var_dump($pageData);

    }
}