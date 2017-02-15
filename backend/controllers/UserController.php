<?php

namespace backend\controllers;

use framework\core\Controller;
use framework\adapter\DB;
use common\models\User;
use framework\libraries\Pagination;

class UserController extends Controller 
{
    
    /**
     *
     * @var array
     */
    public $users;
    /**
     *
     * @var User 
     */
    public $user;

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Users',
        ]);  
        
        $this->user = new User();
        
        $dbh = DB::getInstance();
        $sql = "SELECT * FROM users ORDER BY login ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->users = $stmt->fetchAll(); 
        
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;        
        $pagination = new Pagination();
        $this->pages = $pagination->setCurrentPage($page)
                ->setRecordsCount(200)
                ->setPerPageLimit(10)
                ->setMaxPageCount(8)
                ->getPages();        
        
        $this->view->render('index');
    }
    
}
