<?php

namespace app\models;

use frm\core\Model;
use frm\core\DB;

class User extends Model 
{
    /**
     *
     * @var string
     */
    private $login = "admin";
    /**
     *
     * @var string
     */
    private $password = "123";
    
    /**
     * 
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function check($login, $password) {
        if ($login == $this->login && $password == $this->password) {
            return true;
        } else {
            return false;
        }
    }
    
}
