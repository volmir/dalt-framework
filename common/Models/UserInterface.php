<?php

namespace Common\Models;

interface UserInterface {
    
    /**
     * Check user by login and password
     * @param string $login
     * @param string $password
     * @param string $type
     * @return boolean
     */
    public function check($login, $password, $type);
    
    /**
     * Finds an identity by the given ID.
     * @param string|int $id
     * @return object
     */
    public static function findIdentity($id);
    
    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int
     */
    public function getId();
    
}
