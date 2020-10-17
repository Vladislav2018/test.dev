<?php


namespace models;


class DBConnection
{
    private static $instances = [];

    protected function __construct($server = "localhost", $user = "root", $passowrd = "root", $bd_name = "testDB")
    {
        $connection = new \mysqli($server, $user, $passowrd);
        if($connection->connect_error)
        {
            die("Connection refused with a error: ".$connection->connect_error);
        }
        else
        {
            $this->connection = $connection;
            $this->connection->select_db($bd_name);
        }
    }
    protected function __clone() { }
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize one more connection.");
    }
    public static function getInstance(): DBConnection
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }

    public function execute($query)
    {
        $this->connection->query($query);
        if(!empty($this->connection->error_list))
        {
            var_dump($this->connection->error_list);
        }
    }

    protected function __destruct()
    {
        $this->connection->close();
        echo "Connection is closed";
    }

}