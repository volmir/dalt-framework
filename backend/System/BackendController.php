<?php

namespace Backend\System;

use Dalt\Core\Controller;
use Dalt\Core\Auth;
use Dalt\Core\Response;

class BackendController extends Controller 
{
    
    public function __construct() 
    {
        if (!Auth::isAuth()) { 
            Response::redirect('/login/');
        }
    }
    
}
