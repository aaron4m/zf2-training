<?php
namespace News\Mapper;

use ZfcBase\Mapper\AbstractDbMapper;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;

class News extends AbstractDbMapper
{
    protected $tableName  = 'news';

    public function find($id)
    {
        $select = $this->getSelect()->where(array('newsId'=>$id));
        $entity = $this->select($select)->current();

        return $entity;
    }

    public function findAll()
    {
        $select = $this->getSelect();
        $result = $this->select($select);

        $resultSet = new HydratingResultSet(new ReflectionHydrator, $this->getEntityPrototype());
        $resultSet->initialize($result);

        return $result;
    }

    public function insert($entity)
    {
        $result = parent::insert($entity);
        $entity->setNewsId($result->getGeneratedValue());
        return $result;
    }

    public function update($entity)
    {
        $result = parent::update($entity, array('newsId'=>$entity->getNewsId()));
        return $result;
    }

    public function delete($id)
    {
        return parent::delete(array('newsId'=>$id));
    }
}
