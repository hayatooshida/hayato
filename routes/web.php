<?php

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



Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

  Route::get('/', 'ProductController@index');
  Route::get('/{id}', 'ProductController@index');
  Route::name('product.')
      ->group(function () {
          Route::get('/', 'ProductController@index')->name('index');
          Route::get('/product/{id}', 'ProductController@show')->name('show');
      });
      
Route::get('user/{favorites}/favorites','UserController@favorites')->name('user.favorites');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
  
       
    });
    
    Route::resource('users', 'UserController', ['only' => 'show']);



Route::group(['prefix' => 'products/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
