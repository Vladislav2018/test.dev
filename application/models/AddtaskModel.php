<?php


namespace application\models;
use application\models\Model as Model;

class AddtaskModel extends Model
{
    public function add_task($email, $nickname, $task)
    {
        $insert_request = 'INSERT INTO `tasks` (`nickname`, `email`, `task`) VALUES (:nickname, :email, :task)';
        $stmp = $this->db->prepare($insert_request);
        $stmp->bindValue(":nickname", $nickname, \PDO::PARAM_STR);
        $stmp->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmp->bindValue(":task", $task, \PDO::PARAM_STR);
        $stmp->execute();
        $err = $stmp->errorInfo();
        if($err[0] == '0000')
        {
            return true;
        }
        return false;
    }
    public function get_admin_nickname($sess_email)
    {
        $insert_request = 'SELECT nickname FROM admins where  email = :email';
        $stmp = $this->db->prepare($insert_request);
        $stmp->bindValue(":email", $sess_email, \PDO::PARAM_STR);
        $stmp->execute();
        $res = $stmp->fetch();
        return $res["nickname"];
    }

}