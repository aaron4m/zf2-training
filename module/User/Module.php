<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User;
use Zend\Mvc\MvcEvent;


class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $events = $e->getApplication()->getEventManager()->getSharedManager();

////         Attach Additional Form Elements
//        $events->attach('ZfcUser\Form\Register','init', function($e) {
//            $form = $e->getTarget();
//            $form->add(array(
//                'name' => 'fieldname',
//                'type' => 'text',
//                'options' => array(
//                    'label' => 'Field Name'
//                ),
//                'attributes' => array(
//                    'id' => 'cssID',
//                ),
//            ));
//        });
//
////         Attach Validator Events
//        $events->attach('ZfcUser\Form\RegisterFilter','init', function($e) {
//            $form = $e->getTarget();
//
//            $form->add(array(
//                'name'       => 'fielname', 'required'   => true,
//                'validators' => array(array('name' => 'StringLength', 'options' => array( 'min' => 1, 'max' => 120,),),),
//            ));
//        });
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
