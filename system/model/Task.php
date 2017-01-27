<?php

namespace Frm\Model;

use Frm\Core\Model;
use Frm\Core\DB;
use Frm\Model\Image;
use Frm\Model\Task;

class Task extends Model 
{
    
    const STATUS_NEW = 0;
    const STATUS_FINISHED = 1;
    
    /**
     *
     * @var array
     */
    public $data;
    /**
     *
     * @var array
     */
    public $files;    
    /**
     *
     * @var array
     */
    public $errors = [];
    /**
     *
     * @var int 
     */    
    public $lastTaskId;    

    /**
     * 
     * @param int $task_id
     * @return stdClass
     */
    public function getTask($task_id = 0) {
        $params = [];
        $params['task_id'] = $task_id;
        $sql = "SELECT * FROM t_tasks WHERE task_id = :task_id";
        return DB::run($sql, $params)->fetch();
    }
    
    /**
     * 
     * @param int $limit
     * @param array $params
     * @return type
     */
    public function getTasks($limit = 15, $params = []) {
        $where_sql = '';
        if (isset($params['status'])) {
            $where_sql = ' WHERE status = :status ';
        }
        $sql = "SELECT * FROM t_tasks " . $where_sql . " ORDER BY task_id DESC LIMIT " . (int)$limit;
        return DB::run($sql, $params)->fetchAll();
    }    

    /**
     * 
     * @param array $data
     * @param array $files
     * @return boolean
     */
    public function add($data, $files) {        
        $this->data = $data;   
        $this->files = $files; 

        $this->checkData();
        if (count($this->errors)) {
            return false;
        }
        if (!$this->addData()) {
             return false;
        }
        
        return true;
    }
    
    /**
     * 
     * @param array $data
     * @return boolean
     */
    public function edit($data) {     
        if (isset($data['status'])) {
            $data['status'] = Task::STATUS_FINISHED;
        } else {
            $data['status'] = Task::STATUS_NEW;
        }
        $stmt = DB::run("UPDATE t_tasks SET content=?, status=? WHERE task_id=?", [$data['description'], $data['status'], $data['task_id']]);
        $stmt->rowCount();
        
        return true;
    }

    public function checkData() { 
        $this->errors = [];
        
        if (!isset($this->data['email'])) {
            $this->errors[] = 'Email not found';
        }
        if (!isset($this->data['username'])) {
            $this->errors[] = 'Username not found';
        }
        if (!isset($this->data['description'])) {
            $this->errors[] = 'Task description not found';
        }
        
        if (!isset($this->files['image'])) {
            $this->errors[] = 'Image not found';
        }     
        if (!in_array($this->files['image']['type'], Image::getCorrectTypes())) {
            $this->errors[] = 'Incorrect image type';
        } 
    }
    
    /**
     * 
     * @return boolean
     */
    private function addData() {     
        $sql = sprintf("INSERT INTO `t_tasks` (`name`, `email`, `content`) "
                . "VALUES ('%s', '%s', '%s')", 
            addslashes($this->data['email']),
            addslashes($this->data['username']),
            addslashes($this->data['description'])
        );
        $q = DB::getInstance()->prepare($sql);
        $result_add = $q->execute();

        $dbh = DB::getInstance();
        $this->lastTaskId = $dbh->lastInsertId();
        
        $result_upload = $this->uploadImage();
       
        $result = true;
        if (!$result_add || !$result_upload || count($this->errors)) {
            $result = false;
        }
        
        return $result;
    }
    
    /**
     * 
     * @return boolean
     */
    private function uploadImage() { 
        $image_name = $this->lastTaskId . \Model\Image::getImageExt($this->files['image']['type']);
        
        $params = [];
        $params['name'] = $image_name;
        $params['tmp_name'] = $this->files['image']['tmp_name'];
        $params['type'] = $this->files['image']['type'];
        
        $image = new Image();
        if ($image->upload($params)) { 
            $sql = sprintf("UPDATE `t_tasks` SET `image` = '%s' WHERE `task_id` = '%d'", 
                addslashes($image_name),
                addslashes($this->lastTaskId)    
            );
            $q = DB::getInstance()->prepare($sql);
            if (!$q->execute()) {
                $this->errors[] = 'Image name not updated';
                return false;
            }             
            return true; 
        } else {
            $this->errors[] = 'Image not upload';          
            return false;
        }
    }    
}
