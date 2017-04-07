<?php

namespace Dalt\Core;

use Dalt\Interfaces\IdentityInterface;

class Auth implements IdentityInterface
{
    /**
     *
     * @var \Common\Models\User
     */
    protected $user;
    
    public function __construct(\Common\Models\User $user) 
    {
        if (isset($user)) {
            $this->user = $user;
        }
    }

    /**
     *
     * @return boolean
     */
    public static function isAuth()
    {
        if (isset($_SESSION["login"])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function auth($login, $password)
    {
        $userObj = $this->user::where('login', $login)
                ->where('status', $this->user::STATUS_ACTIVE)
                ->first();
        if (password_verify($password, $userObj->password)) {        
            $_SESSION["login"] = $login;
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @return mixed
     */
    public static function getUser()
    {
        if (self::isAuth()) {
            return $_SESSION["login"];
        } else {
            return false;
        }
    }

    public static function logout()
    {
        unset($_SESSION["login"]);
    }

    /**
     *
     * @param int $id
     * @return Common\Models\User
     */
    public function findIdentity($id)
    {
        return $this->user::find($id);
    }

    /**
     *
     * @return int
     */
    public function getId()
    {
        
    }

}
