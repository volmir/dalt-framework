<?php

namespace Dalt\Core;

use Common\Models\User;
use Dalt\Interfaces\IdentityInterface;

class Auth implements IdentityInterface
{

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
    public static function auth($login, $password)
    {
        if (self::check($login, $password)) {
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
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public static function check($login, $password)
    {
        $user = User::where('login', $login)
                ->where('status', User::STATUS_ACTIVE)
                ->first();

        if (isset($user) && $user instanceof User && password_verify($password, $user->password)) {
            return true;
        } else {
            return false;
        }
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
        
    }

}
