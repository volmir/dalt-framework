<?php

use Frm\Core\Controller;
use Frm\Core\Response;
use Frm\Core\Auth;
use Frm\Core\Application;
use Frm\Model\Task;

class adminController extends Controller {
    
    /**
     *
     * @var stdClass
     */
    public $task;  
    /**
     *
     * @var array
     */
    public $tasks;     
    
    public function __construct() {
        parent::__construct();
        
        if (!Auth::isAuth()) {
            Response::redirect('/login/');
        }
    }

    public function indexAction() {
        var_dump($_GET);
        $task = new Task();
        $limit = 15;
        $params = [];
        if (isset($_GET['status']) && in_array($_GET['status'], [Task::STATUS_NEW, Task::STATUS_FINISHED])) {
            $params['status'] = $_GET['status'];
        }
        $this->tasks = $task->getTasks($limit, $params);
        
        $this->view->set('title', 'Admin zone');
        $this->view->render('index');
    }
    
    public function editAction() {
        if (isset($_REQUEST['task_id']) && $_REQUEST['task_id'] > 0) {
            $task = new Task();
            $this->task = $task->getTask($_REQUEST['task_id']);
            
            if (is_object($this->task)) {
                $this->view->set('title', 'Edit task');
                $this->view->render('edit');
            }
        } else {
            Response::redirect('/admin/');
        }  
    }
    
    public function saveAction() {
        $task = new Task();
        $editDataStatus = $task->edit($_REQUEST);

        $url = '/admin/?edit_status=' . ($editDataStatus ? 'success' : 'error');
        Response::redirect($url);
    }     
    
}
