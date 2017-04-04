<?php

namespace Backend\System;

use Dalt\Core\Controller;
use Dalt\Core\Auth;
use Dalt\Core\Response;
use Backend\System\Asset;

class BackendController extends Controller 
{
    
    /**
     *
     * @var Asset 
     */
    public $assets; 
    
    public function __construct() 
    {
        if (!Auth::isAuth()) { 
            Response::redirect('/login/');
        }
        
        $this->assets = new Asset(); 
    }
    
}
