<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('/', function ($routes) {
	$routes->get('', 'HomeController::index');
	$routes->get('login', 'LoginController::index');
	$routes->post('login', 'LoginController::index');
	$routes->get('cms', 'LoginController::admin');
	$routes->post('cms', 'LoginController::admin');
	$routes->get('logout', 'LoginController::sign_out');
	$routes->get('register', 'RegisterController::index');
	$routes->post('register', 'RegisterController::index');
});

$routes->group('sys', ['filter' => 'admin_auth'], function ($routes) {
	$routes->add('', 'Admin\HomeController::index');

	$routes->get('admin', 'Admin\AdminController::index');
	$routes->post('admin', 'Admin\AdminController::create');
	$routes->post('admin/all', 'Admin\AdminController::get');
	$routes->post('admin/activate', 'Admin\AdminController::aktif');
	$routes->post('admin/deactivate', 'Admin\AdminController::non_aktif');

	$routes->add('user', 'Admin\UserController::index');
	$routes->post('user/all', 'Admin\UserController::get');
	$routes->post('user/activate', 'Admin\UserController::aktif');
	$routes->post('user/deactivate', 'Admin\UserController::non_aktif');

	$routes->add('category', 'Admin\CategoryProductController::index');
	$routes->post('category', 'Admin\CategoryProductController::create');
	$routes->post('category/all', 'Admin\CategoryProductController::get');


	$routes->get('seller', 'Admin\SellerController::index');
	$routes->post('seller/all', 'Admin\SellerController::get');
	$routes->get('seller/new', 'Admin\SellerController::new');
	$routes->get('seller/(:segment)', 'Admin\SellerController::show/$1');
	$routes->get('seller/(:segment)/edit', 'Admin\SellerController::edit/$1');
	$routes->put('seller/(:segment)', 'Admin\SellerController::update/$1');
	$routes->patch('seller/(:segment)', 'Admin\SellerController::update/$1');
	$routes->delete('seller/(:segment)', 'Admin\SellerController::delete/$1');
	$routes->post('seller/verification', 'Admin\SellerController::verification');
});

$routes->group('user', ['filter' => 'user_auth'], function ($routes) {
	$routes->add('', 'User\HomeController::index');

	$routes->get('profile', 'User\ProfileController::index');
	$routes->get('profile/get', 'User\ProfileController::get');
	$routes->post('profile', 'User\ProfileController::update');

	$routes->get('product', 'User\ProductController::index');
	$routes->post('product/all', 'User\ProductController::get');
	$routes->get('product/new', 'User\ProductController::new');


	$routes->add('faq', 'User\ControllerUser::faq');
	$routes->add('review', 'User\ControllerUser::review');
	$routes->add('account', 'User\ControllerUser::account');
	$routes->add('paket', 'User\ControllerUser::paket');
	$routes->add('paket/(:segment)', 'User\ControllerUser::detailPaket/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
