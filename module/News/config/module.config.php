<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'news' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/news[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'News\Controller\News',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'News\Controller\News' => 'News\Controller\NewsController'
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'News\Entity\News' => 'News\Entity\News'
        ),
        'factories' => array(
            'News\Service\News' => 'News\Service\Factory\NewsServiceFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
