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

Route::get('item/food', [
    'as' => 'item.food',
    'uses' => 'Controller@itemFood'
]);

Route::get('order', [
    'as' => 'order',
    'uses' => 'OrderController@index'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [
        'as' => 'home',
        'uses' => 'ProfileController@index'
    ]);
    Route::get('editProfile', ['uses' => 'ProfileController@editProfile', 'as' => 'editProfile']);
    Route::post('home/editProfile', 'ProfileController@editProfile');
});
Route::get('food/{id}', [
    'as' => 'food.show',
    'uses' => 'FoodController@show'
]);

Route::get('comment', ['uses' => 'FoodController@commet', 'as' => 'comment']);
Route::post('food/deleteRepComment', 'FoodController@deleteRepComment');
Route::post('food/deleteComment', 'FoodController@deleteComment');
Route::post('food/comment', 'FoodController@comment');
Route::post('food/repComment', 'FoodController@repComment');
Route::post('food/editRepComment', 'FoodController@editRepComment');
Route::post('food/editComment', 'FoodController@editComment');
Route::post('/addToCart', 'Controller@addToCart');
Route::post('/deleteRow', 'Controller@deleteRow');
Route::post('/updateRow', 'Controller@updateRow');
Route::post('food/vote', 'FoodController@vote');
Route::post('food/unLike', 'FoodController@unLike');
Route::post('food/like', 'FoodController@like');
Route::post('order/addOrder', 'OrderController@addOrder');
