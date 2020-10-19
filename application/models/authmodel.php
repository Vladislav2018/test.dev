<?php


namespace application\models;


class AuthModel extends Model
{
    public function checkAdmin()
    {
        //refactor- replace to controller
        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $auth_request = 'SELECT FROM amnins WHERE email = :email AND password = :password';
        $stmp = $this->db->prepare($auth_request);
        $stmp->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmp->bindValue(":password", $password, \PDO::PARAM_STR);
        $stmp->execute();

        $res = $stmp->fetch(\PDO::FETCH_ASSOC);
        if(!empty($res))
        {
            echo 'temp authmodel answer';
        }
        else
        {
            return false;
        }
    }
}