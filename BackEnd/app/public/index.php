<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the trips endpoint
$router->get('/trips', 'TripController@getAll');
$router->get('/trips/(\d+)', 'TripController@getOne');
$router->post('/trips', 'TripController@create');
$router->put('/trips/(\d+)', 'TripController@update');
$router->delete('/trips/(\d+)', 'TripController@delete');

// routes for the accommodations endpoint
$router->get('/accommodations', 'AccommodationController@getAll');

// routes for the destinations endpoint
$router->get('/destinations', 'DestinationController@getAll');

// routes for the categories endpoint
$router->get('/categories', 'CategoryController@getAll');

// routes for the users endpoint
$router->post('/users/login', 'UserController@login');
$router->post('/users/signup', 'UserController@signup');
$router->put('/users/update', 'UserController@update');
$router->get('/users/(\d+)', 'UserController@getOne');

// routes for the reservations endpoint
$router->get('/reservations', 'ReservationController@getAll');
$router->post('/reservations', 'ReservationController@create');


// Run it!
$router->run();
// var_dump('Line executed: ', $router);
