<?php


namespace application\models;


class Model
{
    protected  $db = null;
    public function __construct()
    {
        $this->db = core\DB::connToDB();
    }
}