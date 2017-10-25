<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();
Route::post('/login', 'Auth\LoginController@login');
Auth::routes();
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
//Registration Routes...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Auth::routes();
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Auth::routes();
// Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Auth::routes();
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Auth::routes();
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Auth::routes();
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/comment/{id}', 'start@comment');
/* START PAGES */
Route::get('/', 'start@index');
Route::get('/{id}', 'start@film');
Route::post('/search', 'start@search');
Route::get('/admin/add/film', 'start@add');
Route::post('/admin/add/films', 'start@add_film');
Route::get('/categories/{menu}', 'start@categories');
Route::post('/{id}', 'start@addcomment');
