<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route Authenticating Account
$routes->group('', static function ($routes) {
    $routes->get('/login', 'Authenticating::index'); // index as login
    $routes->post('/auth', 'Authenticating::auth');
    $routes->get('/register', 'Authenticating::register');
    $routes->post('/register/store', 'Authenticating::store');
});

// Route For Free User
$routes->get('/rent', 'PenyewaRental::index');
$routes->get('/rentbusana', 'PenyewaRental::dataBusana');


// Route Needed Authenticated
$routes->group('', ['filter' => 'Auth'], static function ($routes) {
    $routes->get('/logout', 'Authenticating::logout');
    
    // Authenticated Admin
    $routes->group('', ['filter' => 'Admin'], static function ($routes) {
        $routes->get('/', 'Home::index');
        
        $routes->group('/user', static function ($routes) {
            $routes->get('', 'Users::index');
            $routes->get('create', 'Users::create');
            $routes->post('', 'Users::store');
            $routes->get('(:num)', 'Users::edit/$1');
            $routes->put('(:num)', 'Users::update/$1');
            $routes->delete('(:num)', 'Users::destroy/$1');
        });

        $routes->group('/busana', static function($routes){
            $routes->get('', 'Busana::index' );
            $routes->get('create', 'Busana::create' );
            $routes->get('detail/(:num)', 'Busana::detail/$1');
            $routes->post('', 'Busana::store');
            $routes->put('(:num)', 'Busana::update/$1');
            $routes->delete('(:num)', 'Busana::delete/$1');
        });

        $routes->group('/paket', static function($routes){
            $routes->get('', 'Paket::index');
            $routes->get('create', 'Paket::create');
            $routes->post('store', 'Paket::store');
            $routes->get('(:num)', 'Paket::detail/$1');
        });

        $routes->group('/fotobusana', static function($routes){
            $routes->post('(:num)', 'FotoBusana::store/$1');
            $routes->delete('(:num)', 'FotoBusana::delete/$1');
        });

        $routes->group('/ukuran', static function($routes){
            $routes->post('(:num)', 'Ukuran::store/$1');
            $routes->delete('(:num)', 'Ukuran::delete/$1');
        });
        
        $routes->group('/jenis', static function($routes){
            $routes->get('', 'JenisBusana::index');
            $routes->get('create', 'JenisBusana::create');
            $routes->post('store', 'JenisBusana::store');
            $routes->get('(:num)', 'JenisBusana::edit/$1');
            $routes->put('(:num)', 'JenisBusana::update/$1');
            $routes->delete('(:num)', 'JenisBusana::delete/$1');
        });

    });
});

