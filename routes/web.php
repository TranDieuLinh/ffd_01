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

Route::get('comment', ['uses' => 'FoodController@commet', 'as' => 'comment']);
Route::post('food/addToCart', 'FoodController@addToCart');
Route::post('food/deleteRepComment', 'FoodController@deleteRepComment');
Route::post('food/deleteComment', 'FoodController@deleteComment');
Route::post('food/comment', 'FoodController@comment');
Route::post('food/repComment', 'FoodController@repComment');
Route::post('food/editRepComment', 'FoodController@editRepComment');
Route::post('food/editComment', 'FoodController@editComment');