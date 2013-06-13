<?php

namespace News\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use ZfcBase\EventManager\EventProvider;

class News extends EventProvider implements ServiceManagerAwareInterface
{

    public function save($postData)
    {
        $entity = $this->getMapper()->getEntityPrototype();
        $this->getMapper()->getHydrator()->hydrate($postData, $entity);

        if (!is_null($entity->getNewsId())) {
            $this->getMapper()->update($entity);
        } else {
            $this->getMapper()->insert($entity);
        }

    }

    public function delete($id)
    {
        $this->getMapper()->delete($id);
    }

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    function getEntity()
    {
        return $this->getMapper()->getEntityPrototype();
    }

    function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }

    function getMapper()
    {
        return $this->mapper;
    }

}