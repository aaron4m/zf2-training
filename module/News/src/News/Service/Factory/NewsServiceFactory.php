<?php
namespace News\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use News\Service\News as Service;
use News\Mapper\News as Mapper;

/**
 * Class CategoryServiceFactory
 *
 * @package Admin\Service\Factory
 */
class NewsServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * @param ServiceLocatorInterface $serviceLocator
     * @return Category
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new Mapper;
        $mapper->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));
        $mapper->setEntityPrototype($serviceLocator->get('News\Entity\News'));
        $mapper->getHydrator()->setUnderscoreSeparatedKeys(false);
        $service = new Service;
        $service->setMapper($mapper);

        return $service;

    }

}
