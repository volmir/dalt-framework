<?php

namespace Frontend\Controllers;

use Dalt\Core\Controller;
use Dalt\Adapter\Eloquent;
use Common\Models\Log;

class IndexController extends Controller
{

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Index page',
        ]);

        $this->view->render('index');
    }

}
