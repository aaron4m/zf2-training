<?php

namespace User\Entity;
use ZfcRbac\Identity\IdentityInterface;
use ZfcUser\Entity\User as ZfcUser;

class User extends ZfcUser implements IdentityInterface
{
    protected $roles = 'editor';

    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}