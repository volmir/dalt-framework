<?php

namespace frontend\controllers;

use framework\core\Controller;
use framework\libraries\Pagination;

class IndexController extends Controller
{

    public function indexAction() 
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;        
        $pagination = new Pagination();
        $this->pages = $pagination->setCurrentPage($page)
                ->setRecordsCount(200)
                ->setPerPageLimit(10)
                ->setMaxPageCount(8)
                ->getPages();

        $this->view->set([
            'title' => 'Index page',
        ]);

        $this->view->render('index');
    }

}
