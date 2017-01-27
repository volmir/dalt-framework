<?php

class ContactsController extends \Core\Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        
        $this->view->set('title', 'Contacts');
        $this->view->render('index');
    }
    
}
