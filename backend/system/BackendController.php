<?php

namespace backend\system;

use framework\core\Controller;
use framework\core\Auth;
use framework\core\Response;

class BackendController extends Controller 
{
    
    public function __construct() 
    {
        if (!Auth::isAuth()) { 
            Response::redirect('/login/');
        }
    }
    
}
