<?php


namespace core;
require_once __DIR__.'/../vendor/autoload.php';

class DB
{
    const host = "localhost";
    const user = "root";
    const pass = "root";
    const dn_name = "testdb";

    public static function connectToDB()
    {
        $user = self::user;
        $pass = self::pass;
        $host = self::host;
        $db   = self::dn_name;
        $conn = new \PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }
}