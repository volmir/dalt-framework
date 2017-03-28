<?php

namespace Common\Models;

use Common\Models\UserInterface;
use Dalt\Adapter\Eloquent;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserInterface
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

    public function __construct() 
    {
        Eloquent::getInstance();
    }

        /**
     *
     * @param string $login
     * @param string $password
     * @param string $type
     * @return boolean
     */
    public function check($login, $password, $type = self::TYPE_USER)
    {
        $user = User::where('login', $login)
                ->where('status', self::STATUS_ACTIVE)
                ->where('type', $type)
                ->first();
        
        if (isset($user) && $user instanceof User && password_verify($password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }

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
    
    /**
     * 
     * @param int $id
     * @return User
     */
    public static function findIdentity($id) 
    {
        return User::find($id);
    }
    
    /**
     * 
     * @return int
     */
    public function getId() 
    {
        return $this->user_id;
    }    
}
