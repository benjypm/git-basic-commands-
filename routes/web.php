<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);
/*Auth::routes();*/
Route::resource('/create', 'CreateController');
//Route::resource('/create', 'CreateController');
/*Route::resource('news', 'NewsController', ['except' => 'show', 'create', 'edit']);
Route::post('news', 'NewsController@store', ['except' => 'show', 'create', 'edit'])->name('news.store')->middleware('verified');*/
//Route::get('ambient', 'NewsController@ambient')->name('news.ambient');
/*Route::get('ambient','NewsAmbientController')->name('news.ambient');
Route::get('art', 'NewsArtController')->name('news.art');
Route::get('culture', 'NewsCultureController')->name('news.culture');
Route::get('economic', 'NewsEconomicController')->name('news.economic');
Route::get('education', 'NewsEducationController')->name('news.education');
Route::get('health', 'NewsHealthController')->name('news.health');
Route::get('opinion', 'NewsOpinionController')->name('news.opinion');
Route::get('politic', 'NewsPoliticController')->name('news.politic');
Route::get('science', 'NewsScienceController')->name('news.science');
Route::get('sport', 'NewsSportController')->name('news.sport');
Route::get('technology', 'NewsTechnologyController')->name('news.technology');
Route::get('world', 'NewsWorldController')->name('news.world');
Route::get('more', 'NewsMoreController')->name('news.more');*/

/*Route::get('news/{id}/edit', 'NewsController@update')->name('news.update')->middleware('verified');*/
/*Route::post('news/{id}', 'NewsController@update')->name('news.update')->middleware('verified');
Route::get('news/{id}/show', 'NewsController@show')->name('news.show');*/


/*Route::resource('prov1/public/tareas', 'TaskController');

Route::get('prov1/public/tareas', 'TaskController@index');

Route::put('prov1/public/tareas/actualizar', 'TaskController@update');

Route::post('prov1/public/tareas/guardar', 'TaskController@store');

Route::delete('prov1/public/tareas/borrar/{id}', 'TaskController@destroy');

Route::get('prov1/public/tareas/buscar', 'TaskController@show');
*/
/*Route::get('prov1/public/getCountries', 'CountrieController@getCountries');*/
/*Route::resource('type','TypesController');*/
/*Route::resource('/', 'TypesController');*/
/*Route::get('news/create', 'TypesController@getTypes');*/
/*Route::post('news/create', 'CountrieController@getCountries');*/
/*Route::get('getTypes', 'TypesController@getTypes');
Route::get('getCountries', 'CountrieController@getCountries');
Route::get('getRegions', 'CountrieController@getRegions');
Route::get('getCities', 'CountrieController@getCities');*/



//Route::resource('news/ambient', 'AmbientController');
//Route::get('ambient','AmbientController');
/*Route::post('news/ambient', 'NewsController@getAmbient')->name('news.ambient')->middleware('verified');
Route::get('news/ambient', 'NewsController@getAmbient')->name('news.ambientt')->middleware('verified');*/

//Route::resource('newss', 'NewssController');

Route::get('/create', function () {
    return view('create');
})->name('create')->middleware('verified');
/*Route::get('ambient', function () {
    return view('ambient');
})->name('news.ambient')->middleware('verified');*/


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
Route::get('/blogger', 'BloggerController@index')->name('blogger')->middleware('verified');
/*Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('verified');*/
//Route::post('/create', 'CreateController@store')->name('create')->middleware('verified');
//Route::get('/dynamic_dependent', 'DynamicDependent@index');

//Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');
	
//Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);

//Route::resource('newss/create','CountrieController');
Route::get('regions/{id}','CountrieController@getRegions');
Route::get('cities/{id}','CountrieController@getCities');

//Route::get('newss.regions/{id}','CountrieController@getRegions');
//Route::get('newss.cities/{id}','CountrieController@getCities');

//Route::get('newss/create/{id}','CountrieController@getRegions');
//Route::get('newss.create/{id}','CountrieController@getRegions');

/*Route::resource('newss/create','CountrieController');//ruta news clave1
Route::get('newss/regions/{id}','CountrieController@getRegions');
Route::get('newss/cities/{id}','CountrieController@getCities');*/
/*rutas para newss/create*/
//Route::resource('newss','CountrieController');//ruta news clave1
//Route::resource('news','NewsController');//ruta news clave1
//Route::resource('newss','NewsController@index');
//Route::resource('news/create','CountrieController');//ruta news clave1
//Route::get('newss/create','TypeController@index');
Route::get('news/regions/{id}','CountrieController@getRegions');
Route::get('news/cities/{id}','CountrieController@getCities');



//Route::resource('create','CountrieController');//ruta news clave1
//Route::get('newss/regions/{id}','CountrieController@getRegions');
//Route::get('newss/cities/{id}','CountrieController@getCities');

/*rutas para newss/create*/
/*Route::resource('create','CountrieController');//ruta news clave1
Route::get('regions/{id}','CountrieController@getRegions');
Route::get('cities/{id}','CountrieController@getCities');*/


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/blogger', 'Auth\LoginController@showBloggerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/blogger', 'Auth\RegisterController@showBloggerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/blogger', 'Auth\LoginController@bloggerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/blogger', 'Auth\RegisterController@createBlogger');

//Route::view('/home', 'home')->middleware('auth');
//Route::view('/home', 'home')->middleware('verified');
Route::view('/admin', 'admin');
Route::view('/blogger', 'blogger');

/*Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('login', 'AdminAuthController@getLogin')->name('login');
    Route::post('login', 'AdminAuthController@postLogin');
})*/




//Route::get('regions/{id}','CountrieController@getRegions');
//Route::get('cities/{id}','CountrieController@getCities');
//Route::get('/nexmo', 'NexmoController@show')->name('nexmo');
//Route::post('/nexmo', 'NexmoController@verify')->name('nexmo');
//Route::get('formulario', 'StorageController@index');
//Route::get('newss/create', 'StorageController@index');