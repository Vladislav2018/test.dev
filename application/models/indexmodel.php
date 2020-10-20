<?php


namespace application\models;
use application\models\Model as Model;

class IndexModel extends Model
{
    public function load_tasks($tasks_per_page, $offset)
    {
        $tasks_request = 'SELECT * FROM tasks LIMIT :limit OFFSET :offset';
        $stmp = $this->db->prepare($tasks_request);
        $stmp->bindValue(":limit", $tasks_per_page, \PDO::PARAM_INT);
        $stmp->bindValue(":offset", $offset, \PDO::PARAM_INT);
        $stmp->execute();
        //print_r($stmp->errorInfo());
        $res = array();
        $res['count'] = $this->count_pages($tasks_per_page);
        $res['request'] = $stmp->fetchAll(\PDO::FETCH_ASSOC);
        //var_dump($res);
        return $res;
    }
    public function count_pages($limit)
    {
        $count_request = 'SELECT COUNT(*) FROM tasks';
        $stmp = $this->db->prepare($count_request);
        $stmp->execute();
        $res['strings'] = $stmp->fetch();
        $res['pages'] = ceil( (float)$res['strings'][0]/(float)$limit) ;
        return $res;
    }
    public function delete_items($post)
    {
        if(!isset($post))
            return;
        $action = $post['action'];
        unset($post['action']);

        $delete_query = $action." FROM tasks WHERE id IN (" . implode(',', array_map('intval', $post)) . ")";
        $stmp = $this->db->prepare($delete_query);
        $stmp->execute();
    }
}