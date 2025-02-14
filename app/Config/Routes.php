<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Auth
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/login', 'Auth::procLogin');
$routes->post('/auth/register', 'Auth::procRegister');
$routes->get('/auth/logout', "Auth::logout");

// User
$routes->get('/', 'User::index');
$routes->get('/topup', "User::topup");
$routes->get('/toko', 'User::shop');
$routes->get('/joki', 'User::joki');
$routes->get('/blog', 'User::blog');
$routes->get('/product/(:num)', "User::product/$1");

// Admin
$routes->get('/admin/product', 'Admin::product');
$routes->get('/admin/topup', 'Admin::topup');
$routes->get('/admin/variant', "Admin::variantProduct");
$routes->get('/admin/form/product', "Admin::addProduct");
$routes->get('/admin/change/product/(:num)', 'Admin::changeProduct/$1');

// Response
$routes->post('/admin/create/variant', 'Response::createVariant');
$routes->post('/admin/delete/variant/(:num)', 'Response::createVariant/$1');
$routes->post('/admin/create/product', 'Response::createProduct');
$routes->post('/admin/update/product', "Response::updateProduct");
$routes->get('/admin/delete/product/(:num)', "Response::deleteProduct/$1");
$routes->get('/add/wishlist/(:num)', "Response::addWishlist/$1");
$routes->get('/admin/get/product/(:num)', 'Response::getProduct/$1');
