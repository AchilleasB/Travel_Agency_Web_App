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
$router->get('/trips', 'TripController@getAll');
$router->get('/trips/(\d+)', 'TripController@getOne');
$router->post('/trips', 'TripController@create');
$router->put('/trips/(\d+)', 'TripController@update');
$router->delete('/trips/(\d+)', 'TripController@delete');

// routes for the accommodations endpoint
$router->get('/accommodations', 'AccommodationController@getAll');
$router->get('/accommodations/(\d+)', 'AccommodationController@getOne');
$router->post('/accommodations', 'AccommodationController@create');
$router->put('/accommodations/(\d+)', 'AccommodationController@update');
$router->delete('/accommodations/(\d+)', 'AccommodationController@delete');
// routes for the destinations endpoint
$router->get('/destinations', 'DestinationController@getAll');
$router->get('/destinations/(\d+)', 'DestinationController@getOne');
$router->post('/destinations', 'DestinationController@create');
$router->put('/destinations/(\d+)', 'DestinationController@update');
$router->delete('/destinations/(\d+)', 'DestinationController@delete');

// routes for the categories endpoint
$router->get('/categories', 'CategoryController@getAll');
$router->get('/categories/(\d+)', 'CategoryController@getOne');
$router->post('/categories', 'CategoryController@create');
$router->put('/categories/(\d+)', 'CategoryController@update');
$router->delete('/categories/(\d+)', 'CategoryController@delete');

// routes for the users endpoint
$router->post('/users/login', 'UserController@login');

// Run it!
$router->run();
// var_dump('Line executed: ', $router);
