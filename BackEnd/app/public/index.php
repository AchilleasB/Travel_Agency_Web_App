<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the destinations endpoint
$router->get('/destinations', 'DestinationsController@getAll');
$router->get('/destinations/(\d+)', 'DestinationsController@getOne');
$router->post('/destinations', 'DestinationsController@create');
$router->put('/destinations/(\d+)', 'DestinationsController@update');
$router->delete('/destinations/(\d+)', 'DestinationsController@delete');

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