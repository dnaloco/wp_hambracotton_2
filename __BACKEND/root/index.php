<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

// Teste de API Rest

require_once 'r2-bootstrap.php';

require_once(dirname(__FILE__) . '/' . 'wp-config.php');

use Respect\Rest\Router;

$router = new Router();

$router->isAutoDispatched = false;

$router->get(['/*/**', '/consultar/*'], function () {
	return null;
});

$router->any('/blog/', 'Blog\Controllers\BlogController');

$router->any('/home/', 'Blog\Controllers\HomeController');

$router->any('/post/*', 'Blog\Controllers\PostController');

$router->any('/archive/*/**', 'Blog\Controllers\ArchiveController');

$router->any('/category/*', 'Blog\Controllers\CategoryController');

$router->any('/login/', 'Blog\Controllers\LoginController');

// $router->any('/teste', 'Blog\Controllers\TesteController');

$router->run();
// FIM

define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
