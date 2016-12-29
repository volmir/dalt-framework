<?php

class indexController extends \Core\Controller {

    /**
     *
     * @var array
     */
    public $tasks;  
    /**
     *
     * @var boolean
     */
    public $addDataStatus = true;

    public function __construct() {
        parent::__construct();        
    }

    public function indexAction() {
        $task = new \Model\Task();
        $this->tasks = $task->getTasks();
        
        $this->view->set('title', 'Task Manager');
        $this->view->render('index');
    }

    public function addAction() {
        $this->view->set('title', 'Add new task');
        $this->view->render('add');
    }    
    
    public function saveAction() {
        $task = new \Model\Task();
        $this->addDataStatus = $task->add($_REQUEST, $_FILES);
        
        $url = '/?status=' . ($this->addDataStatus ? 'success' : 'error');
        \Core\Application::redirect($url);
    }    
    
    public function resultAction() {
        $this->view->render('result');
    }
}
