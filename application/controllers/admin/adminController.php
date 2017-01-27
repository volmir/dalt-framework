<?php

class adminController extends \Core\Controller {
    
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
        
        if (!\Core\Auth::isAuth()) {
            \Core\Application::redirect('/login/');
        }
    }

    public function indexAction() {
        $task = new \Model\Task();
        $limit = 15;
        $params = [];
        if (isset($_GET['status']) && in_array($_GET['status'], [\Model\Task::STATUS_NEW, \Model\Task::STATUS_FINISHED])) {
            $params['status'] = $_GET['status'];
        }
        $this->tasks = $task->getTasks($limit, $params);
        
        $this->view->set('title', 'Admin zone');
        $this->view->render('index');
    }
    
    public function editAction() {
        if (isset($_REQUEST['task_id']) && $_REQUEST['task_id'] > 0) {
            $task = new \Model\Task();
            $this->task = $task->getTask($_REQUEST['task_id']);
            
            if (is_object($this->task)) {
                $this->view->set('title', 'Edit task');
                $this->view->render('edit');
            }
        } else {
            \Core\Application::redirect('/admin/');
        }  
    }
    
    public function saveAction() {
        $task = new \Model\Task();
        $editDataStatus = $task->edit($_REQUEST);

        $url = '/admin/?edit_status=' . ($editDataStatus ? 'success' : 'error');
        \Core\Application::redirect($url);
    }     
    
}
