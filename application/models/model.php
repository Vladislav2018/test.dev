<?php

namespace application\models;
use core\DB as DB;

class Model
{
    protected  $db = null;
    public function __construct()
    {
        $this->db = DB::connectToDB();
    }
}