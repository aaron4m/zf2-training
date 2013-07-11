<?php
/**
 * ZfcRbac Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    /**
     * The default role that is used if no role is found from the
     * role provider.
     */
    'anonymousRole' => 'guest',

    /**
     * Flag: enable or disable the routing firewall.
     */
    'firewallRoute' => true,

    /**
     * Flag: enable or disable the controller firewall.
     */
    'firewallController' => true,

    /**
     * Set the view template to use on a 403 error.
     */
    'template' => 'error/403',

    /**
     * flag: enable or disable the use of lazy-loading providers.
     */
    'enableLazyProviders' => true,

    'firewalls' => array(
        'ZfcRbac\Firewall\Route' => array(

            // Vendors
            array('route' => 'DkcwdZf2Munee', 'roles' => 'guest'),
            array('route' => 'StaticPages', 'roles' => 'approver'),

            // ZfcUser
            array('route' => 'zfcuser/login', 'roles' => 'guest'),
            array('route' => 'zfcuser/logout', 'roles' => 'editor'),
            array('route' => 'zfcuser/lost-password', 'roles' => 'guest'),
            array('route' => 'zfcuser/reset-password', 'roles' => 'guest'),
            array('route' => 'login', 'roles' => 'guest'),
            array('route' => 'logout', 'roles' => 'editor'),

            // Home
            array('route' => 'home', 'roles' => 'guest'),
        ),
    ),

    'providers' => array(
        // These
        'ZfcRbac\Provider\Generic\Role\InMemory' => array(
            'roles' => array(
                'admin',
                'editor' => array('admin'),
                'guest' => array('admin', 'editor'),
            ),
        ),

        // Generic rules go here
        'ZfcRbac\Provider\Generic\Permission\InMemory' => array(
            'permissions' => array(
                'admin' => array('admin', 'add', 'edit', 'delete'),
                'editor' => array('add', 'edit', 'delete'),
            )
        ),
    ),

    /**
     * Set the identity provider to use. The identity provider must be retrievable from the
     * service locator and must implement \ZfcRbac\Identity\IdentityInterface.
     */
    'identity_provider' => 'user_role',
);

/**
 * You do not need to edit below this line
 */
return array(
    'zfcrbac' => $settings,
);
