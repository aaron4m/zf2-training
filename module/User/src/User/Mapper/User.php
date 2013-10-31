<?php
namespace User\Mapper;

use ZfcUser\Mapper\User as ZfcUser;
use Zend\Crypt\Password\Bcrypt;

class User extends ZfcUser
{
    protected $tableName = 'user';

    public function findAll($field = null, $value = null)
    {
        $select = $this->getSelect();

        if (!is_null($field) AND !is_null($value)) {
            $select->where(array($field=>$value));
        }

        $entity = $this->select($select)->toArray();
        return $entity;
    }
}