<?php


namespace application\models;
use application\models\Model as Model;

class AddtaskModel extends Model
{
    public function add_task($email, $nickname, $task)
    {
        $insert_request = 'INSERT INTO `tasks` (`nikname`, `email`, `task`) VALUES (:nickname, :email, :task)';
        $stmp = $this->db->prepare($insert_request);
        $stmp->bindValue(":nikname", $nickname, \PDO::PARAM_STR);
        $stmp->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmp->bindValue(":task", $task, \PDO::PARAM_STR);
        $stmp->execute();
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
    public function get_admin_nickname($sess_email)
    {
        $insert_request = 'SELECT `nicname` FROM `admins` where  email = :email';
        $stmp = $this->db->prepare($insert_request);
        $stmp->bindValue(":email", $sess_email, \PDO::PARAM_STR);
        $stmp->execute();
        $res = $stmp->fetch();
        return $res;
    }

}
}