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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

///////users/////
$app->get('users', 'UsersController@index');
$app->post('user', 'UsersController@add');
$app->put('user/{id}', 'UsersController@update');
$app->delete('user/{id}', 'UsersController@delete');

///////district/////
$app->get('district', 'DistrictsController@index');
$app->post('district', 'DistrictsController@add');
$app->put('district/{id}', 'DistrictsController@update');
$app->delete('district/{id}', 'DistrictsController@delete');

///////state/////
$app->get('state', 'StatesController@index');
$app->post('state', 'StatesController@add');
$app->put('state/{id}', 'StatesController@update');
$app->delete('state/{id}', 'StatesController@delete');

///////country/////
$app->get('country', 'CountriesController@index');
$app->post('country', 'CountriesController@add');
$app->put('country/{id}', 'CountriesController@update');
$app->delete('country/{id}', 'CountriesController@delete');

///////role/////
$app->get('role', 'RolesController@index');
$app->post('role', 'RolesController@add');
$app->put('role/{id}', 'RolesController@update');
$app->delete('role/{id}', 'RolesController@delete');
