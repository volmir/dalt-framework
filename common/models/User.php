<?php

namespace common\models;

use framework\core\Model;
use framework\adapter\DB;

class User extends Model
{
    
    const TYPE_USER = 1;
    const TYPE_ADMIN = 2;
    
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function check($login, $password, $type = self::TYPE_USER)
    {
        $dbh = DB::getInstance();
        $sql = "
            SELECT user_id 
            FROM users 
            WHERE 
                login = :login
                AND password = md5(:password)
                AND status = :status
                AND type = :type
            ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            'login' => $login,
            'password' => $password,
            'status' => self::STATUS_ACTIVE,
            'type' => $type,
        ]);
        $user_id = $stmt->fetchColumn();

        if (isset($user_id) && $user_id > 0) {
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
        $dbh = DB::getInstance();
        $sql = "
            INSERT INTO `users`
                (`login`, `password`, `email`, `firstname`, `lastname`, `registration_date`)
            VALUES
                (:login, md5(:password), :email, :firstname, :lastname, NOW())
        ";
        $stmt = $dbh->prepare($sql);
        return $stmt->execute($params);
    }
}
