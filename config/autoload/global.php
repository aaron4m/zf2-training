<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'service_manager' => array(
        'invokables' => array(
            'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
        ),
    ),
    'session' => array(
        'remember_me_seconds' => 5184000,
        'use_cookies' => true,
        'cookie_httponly' => true,
    ),
);
