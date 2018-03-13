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

Route::get('/', function () {
    return view('welcome');
});

//////////apicontroller
Route::get('api/get_all_products', 'Apicontroller@get_all_products')->name('get_all_products');


//////////////////
Auth::routes();

Route::group(['prefix' => '/', 'middleware' => 'auth'], function() {


Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('add_items', ['as' => 'add_items', 'uses' => 'ProductController@add_items']);
Route::post('add_items', ['as' => 'add_items', 'uses' => 'ProductController@add_items_save']);
Route::get('show_item/{id}', ['as' => 'show_item', 'uses' => 'ProductController@show_item']);
Route::post('show_item/{id}', ['as' => 'show_item', 'uses' => 'ProductController@show_item_update']);
Route::get('publish_item/{id}', ['as' => 'publish_item', 'uses' => 'ProductController@publish_item']);
Route::get('delete_item/{id}', ['as' => 'delete_item', 'uses' => 'ProductController@delete_item']);
Route::get('manage_items', ['as' => 'manage_items', 'uses' => 'ProductController@manage_items']);


Route::get('users_form', ['as' => 'users_form', 'uses' => 'UsersController@users_form']);
Route::post('users_form', ['as' => 'users_form', 'uses' => 'UsersController@users_form_save']);

Route::get('manage_salesman/{id}', ['as' => 'manage_salesman', 'uses' => 'UsersController@manage_salesman']);
Route::get('delete_user/{id}', ['as' => 'delete_user', 'uses' => 'UsersController@delete_user']);


















 });