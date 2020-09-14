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
	$routes->get('kategori/(:segment)', 'ProductController::index/$1');
	$routes->get('login', 'LoginController::index');
	$routes->post('login', 'LoginController::index');
	$routes->get('cms', 'LoginController::admin');
	$routes->post('cms', 'LoginController::admin');
	$routes->get('logout', 'LoginController::sign_out');
	$routes->get('register', 'RegisterController::index');
	$routes->post('register', 'RegisterController::index');
});

$routes->group('sys', ['filter' => 'admin_auth', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
	$routes->add('', 'HomeController::index');

	$routes->get('admin', 'AdminController::index');
	$routes->post('admin', 'AdminController::create');
	$routes->post('admin/all', 'AdminController::get');
	$routes->post('admin/activate', 'AdminController::aktif');
	$routes->post('admin/deactivate', 'AdminController::non_aktif');

	$routes->add('user', 'UserController::index');
	$routes->post('user/all', 'UserController::get');
	$routes->post('user/activate', 'UserController::aktif');
	$routes->post('user/deactivate', 'UserController::non_aktif');

	$routes->add('category', 'CategoryProductController::index');
	$routes->post('category', 'CategoryProductController::create');
	$routes->post('category/all', 'CategoryProductController::get');

	$routes->get('cat_blog', 'CategoryBlogController::index');
	$routes->post('cat_blog/all', 'CategoryBlogController::get');
	$routes->post('cat_blog', 'CategoryBlogController::create');

	$routes->get('blog', 'BlogController::index');
	$routes->post('blog/all', 'BlogController::get');
	$routes->post('blog', 'BlogController::create');
	$routes->get('blog/new', 'BlogController::new');

	$routes->get('profile', 'AppProfileController::index');


	$routes->get('seller', 'SellerController::index');
	$routes->post('seller/all', 'SellerController::get');
	$routes->get('seller/new', 'SellerController::new');
	$routes->get('seller/(:segment)', 'SellerController::show/$1');
	$routes->get('seller/(:segment)/edit', 'SellerController::edit/$1');
	$routes->put('seller/(:segment)', 'SellerController::update/$1');
	$routes->patch('seller/(:segment)', 'SellerController::update/$1');
	$routes->delete('seller/(:segment)', 'SellerController::delete/$1');
	$routes->post('seller/verification', 'SellerController::verification');

	$routes->get('banner', 'BannerController::index');
	$routes->post('banner', 'BannerController::create');
	$routes->post('banner/all', 'BannerController::get');
	$routes->put('banner/publish/(:segment)', 'BannerController::publish/$1');
});

$routes->group('user', ['filter' => 'user_auth', 'namespace' => 'App\Controllers\User'], function ($routes) {
	$routes->add('', 'User\HomeController::index');

	$routes->get('profile', 'ProfileController::index');
	$routes->get('profile/get', 'ProfileController::get');
	$routes->post('profile', 'ProfileController::update');

	$routes->get('product', 'ProductController::index');
	$routes->post('product/all', 'ProductController::get');
	$routes->get('product/new', 'ProductController::new');
	$routes->post('product', 'ProductController::add');


	$routes->add('faq', 'ControllerUser::faq');
	$routes->add('review', 'ControllerUser::review');
	$routes->add('account', 'ControllerUser::account');
	$routes->add('paket', 'ControllerUser::paket');
	$routes->add('paket/(:segment)', 'ControllerUser::detailPaket/$1');
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
