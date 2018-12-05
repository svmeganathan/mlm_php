<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->post('/addDistrict', 'DistrictController@createDistrict');
$router->post('/addState', 'StateController@createState');
$router->post('/addCountry','CountryController@createCountry');
$router->post('/addGender','GenderController@createGender');
$router->post('/addRole','RoleController@createRole');
$router->post('/addUser','UserController@createUser');
