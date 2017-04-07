<?php

namespace Dalt\Interfaces;

interface IdentityInterface 
{
    
    /**
     * Check user by login and password
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function auth($login, $password);
    
    /**
     * Finds an identity by the given ID.
     * @param string|int $id
     * @return object
     */
    public function findIdentity($id);
    
    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int
     */
    public function getId();
    
}
