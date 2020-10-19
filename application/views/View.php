<?php


namespace application\views;

class View
{
    public function render($tpl, $pageData)
    {
        ob_start();
        extract($pageData);
        include 'application/views/'. $tpl;
        //return ob_get_clean();
    }
}