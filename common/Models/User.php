<?php

namespace Common\Models;

use Dalt\Core\Model;

class User extends Model
{
    
    const TYPE_USER = 1;
    const TYPE_ADMIN = 2;
    
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    
    /**
     *
     * @var string
     */
    protected $table = 'users';
    /**
     *
     * @var string 
     */
    protected $primaryKey = 'user_id';
    /**
     *
     * @var array
     */
    protected $guarded = ['user_id'];
    /**
     *
     * @var boolean
     */
    public $timestamps = false;    

    /**
     * 
     * @param array $params
     * @return boolean
     */
    public function add($params)
    {
        $user = new User();        
        $user->login = $params['login'];
        $user->password = password_hash($params['password'], PASSWORD_DEFAULT);
        $user->email = $params['email'];
        $user->firstname = $params['firstname'];
        $user->lastname = $params['lastname'];
        $user->registration_date = date("Y-m-d H:i:s"); 
        
        return $user->save();
    }
    
    /**
     * 
     * @return string
     */
    public function getType() 
    {
        $type = '';
        if ($this->type == self::TYPE_USER) {
            $type = 'User';
        } elseif ($this->type == self::TYPE_ADMIN) {
            $type = 'Admin';
        }  
        
        return $type;
    }

}
