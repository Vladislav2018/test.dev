<?php


namespace application\models;
use application\models\Model as Model;

class EdittaskModel extends Model
{
    public function load_task_info($task_id)
    {
        $task_id = htmlspecialchars($task_id);
        $tasks_info_request = 'SELECT * FROM tasks WHERE id = :id';
        $stmp = $this->db->prepare($tasks_info_request);
        $stmp->bindValue(":id", $task_id, \PDO::PARAM_INT);
        $stmp->execute();
        $res = $stmp->fetchAll();
        return $res;
    }
    public function edit_task($task_id, $task_text)
    {
        $task_id = htmlspecialchars($task_id);
        $task_text = htmlspecialchars($task_text);
        $tasks_info_request = "UPDATE tasks SET `task` = :task, `tstatus` = 'edited_by_admin' WHERE id = :id";
        $stmp = $this->db->prepare($tasks_info_request);
        $stmp->bindValue(":id", $task_id, \PDO::PARAM_INT);
        $stmp->bindValue(":task", $task_text, \PDO::PARAM_STR);
        $stmp->execute();

        $err = $stmp->errorInfo();
        if($err[0] == '0000')
        {
            return true;
        }
        return false;
    }
}