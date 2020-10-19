<?php


namespace application\models;
use application\models\Model as Model;

class AuthModel extends Model
{
    public function checkAdmin($email, $password)
    {
        $password = md5($password);
        $auth_request = 'SELECT * FROM admins WHERE email = :email AND password = :password';
        $stmp = $this->db->prepare($auth_request);
        $stmp->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmp->bindValue(":password", $password, \PDO::PARAM_STR);
        $stmp->execute();
        //print_r($stmp->errorInfo());
        $res = $stmp->fetch(\PDO::FETCH_ASSOC);

        if($res == false)
        {
            return $res;
        }
        else
        {
            return true;
        }
    }
}