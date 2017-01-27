<?php

use Frm\Core\Controller;
use Frm\Core\Response;
use Frm\Core\Auth;
use Frm\Model\Task;

class IndexController extends Controller {

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

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {
        $task = new Task();
        $this->tasks = $task->getTasks();
        
        $this->view->set('title', 'Task Manager');
        $this->view->render('index');
    }

    public function addAction() 
    {
        $this->view->set('title', 'Add new task');
        $this->view->render('add');
    }    
    
    public function saveAction() 
    {
        $task = new Task();
        $this->addDataStatus = $task->add($_REQUEST, $_FILES);
        
        $url = '/?status=' . ($this->addDataStatus ? 'success' : 'error');
        Response::redirect($url);
    }    
    
    public function resultAction() 
    {
        $this->view->render('result');
    }
    
}
