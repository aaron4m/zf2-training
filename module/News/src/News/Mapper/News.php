<?php
namespace News\Mapper;

use ZfcBase\Mapper\AbstractDbMapper;
use News\Mapper\Helper\MagicFind;

class News extends AbstractDbMapper
{
    protected $tableName  = 'news';

    public function __call($name, $arguments)
    {
        return MagicFind::find($name, $arguments);
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
        $entity->setNewsId($result->getGeneratedValue());
        return $result;
    }

    public function delete($id)
    {
        return parent::delete(array('newsId'=>$id));
    }
}