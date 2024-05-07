<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('product/getProducts', 'ProductController::getProductsTable');
$routes->post('product/save', 'ProductController::store');
$routes->post('product/edit/(:num)', 'ProductController::update/$1');
$routes->post('product/delete/(:num)', 'ProductController::delete/$1');
