<?php


namespace application\models;
require_once __DIR__.'../../vendor/autoload.php';

class Model
{
    protected  $db = null;
    public function __construct()
    {
        $this->db = DB::connToDB();
    }
}