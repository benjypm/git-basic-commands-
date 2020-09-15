<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
/*Route::resource('user', 'UsersController');*/
Route::resource('user', 'UsersController',
['only' => ['index', 'store', 'update', 'destroy', 'show']]);
 
/*Route::resource('user', 'UserController');*/
Route::get('getTypes', 'TypesController@getTypes');
Route::get('getCountries', 'CountrieController@getCountries');
/*Route::get('prov1/public/news/create/getCountries', 'CountrieController@getCountries');*/
Route::get('getRegions', 'CountrieController@getRegions');
Route::get('getCities', 'CountrieController@getCities');

Route::resource('news', 'NewsController', ['except' => 'show', 'create', 'edit']);
/*Route::post('api/news', 'NewsController@store');*/
//Route::get('news', 'NewsController@index');