<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

define('WEBROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR);

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
