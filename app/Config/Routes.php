<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// public routes (no need to login)
$routes->get('/', 'Auth::loginForm'); // login form
$routes->post('/login', 'Auth::login'); // login
$routes->get('/logout', 'Auth::logout'); // logout
$routes->get('test-db', 'DatabaseTest::index'); // cek koneksi database

// admin routes (need to login as admin)
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('profile', 'Admin::profile'); // admin profile
    $routes->get('add_user', 'Admin::addUserForm'); // add user form
    $routes->post('add_user', 'Admin::addUser'); // add user
});

// user routes (need to login as user)
$routes->group('user', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('profile', 'User::profile'); // user profile
});
