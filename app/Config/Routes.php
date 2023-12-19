<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/register', 'HomeController::register');
$routes->post('/register', 'HomeController::register');

$routes->get('/login', 'HomeController::login');
$routes->post('/login', 'HomeController::login');

$routes->get('/logout', 'HomeController::logout');

$routes->get('/profile', 'HomeController::profile');
$routes->post('/profile', 'HomeController::profile');


$routes->get('/user_dashboard', 'DashboardController::user_dashboard', ['filter' => 'isLogin']);

$routes->group('admin', ['filter' => 'isAdmin'], static function ($routes) {
    $routes->get('admin_dashboard', 'AdminDashboardController::index');
    $routes->get('users', 'AdminDashboardController::users');
    // categories
    $routes->get('product_categories', 'ProductCategoryController::product_categories');
    $routes->post('product_categories', 'ProductCategoryController::product_categories');

});

