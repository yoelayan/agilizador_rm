<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('register', 'UserController::register');
$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::loginValidate');
$routes->get('logout', 'UserController::logout');



/**
 * 
 * CONTROLLER: AUTH
 * LIST ROUTE
 * 
 */


/////////////// Panel //////////////
$routes->get('dashboard', 'AuthController::dashboard', ['filter' => 'auth']);

/////////////// DECLARACIONES //////////////
$routes->get('statements', 'AuthController::statements', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'statements/properties/views/(:num)', 'AuthController::statements_properties_views/$1', ['filter' => 'auth']);

/////////////// USUARIOS //////////////
$routes->match(['get', 'post'], 'users/super_users', 'AuthController::super_users', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'users/administratives', 'AuthController::administrative_users', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'users/agents', 'AuthController::agents_users', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'users/edit_user/(:any)/(:num)', 'AuthController::edit_user/$1/$2', ['filter' => 'auth']);
$routes->match(['get'], 'users/destroy_user/(:any)/(:num)', 'AuthController::destroy_user/$1/$2', ['filter' => 'auth']);

/////////////// PROPIEDADES //////////////
$routes->get('properties/list', 'AuthController::properties', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'properties/my_properties', 'AuthController::my_properties', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'properties/my_properties/views/(:num)', 'AuthController::my_properties_views/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'properties/view_property/(:num)', 'AuthController::view_property/$1', ['filter' => 'auth']);

/////////////// CONFIGURACIONES DE CAMPOS ///////////////
$routes->match(['get', 'post'], 'settings/acea_configuration', 'AuthController::acea_configuration', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/area_type', 'AuthController::area_type', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/housing_type', 'AuthController::housing_type', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/business_model', 'AuthController::business_model', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/market_type', 'AuthController::market_type', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/state', 'AuthController::state', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'settings/municipality', 'AuthController::municipality', ['filter' => 'auth']);

/////////////// FORMULARIOS ///////////////
$routes->match(['get', 'post'], 'component/edit_acea/(:num)', 'AuthController::edit_acea/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_area_type/(:num)', 'AuthController::edit_area_type/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_housing_type/(:num)', 'AuthController::edit_housing_type/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_market_type/(:num)', 'AuthController::edit_market_type/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_business_model/(:num)', 'AuthController::edit_business_model/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_state/(:num)', 'AuthController::edit_state/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'component/edit_municipality/(:num)', 'AuthController::edit_municipality/$1', ['filter' => 'auth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
