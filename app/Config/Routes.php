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


$routes->get('/user_dashboard', 'DashboardController::user_dashboard');
$routes->get('/admin_dashboard', 'AdminDashboardController::index');
$routes->get('/users', 'AdminDashboardController::users');

