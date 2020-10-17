<?php


namespace application\models;
require_once __DIR__ . '../../vendor/autoload.php';

use application\views\View;

class IndexController extends \application\controllers\Controller
{
    private $pageTemplate = '../views/main.tpl.php';
    public function __construct()
    {
        $this->model = new IndexModel();
        $this->model = new View();
    }
    public function index()
    {
        $this->pageData['title'] = 'All tasks';
        $this->view->render($this->pageTemplate, $this->pageData);
    }
}