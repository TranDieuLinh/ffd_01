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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

Route::get('search/food', [
    'as' => 'search.food',
    'uses' => 'HomeController@searchFood'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [
        'as' => 'home',
        'uses' => 'ProfileController@index'
    ]);
});
Route::get('food/{id}', [
    'as' => 'food.show',
    'uses' => 'FoodController@show'
]);