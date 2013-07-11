<?php

namespace User\Entity;
use ZfcRbac\Identity\IdentityInterface;
use ZfcUser\Entity\User as ZfcUser;

class User extends ZfcUser implements IdentityInterface
{
    protected $role;

    public function setRoles($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getRoles()
    {
        return $this->role;
    }
}