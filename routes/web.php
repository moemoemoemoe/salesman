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
Route::get('api/get_all_products', 'ApiController@get_all_products')->name('get_all_products');

Route::get('api/get_all_customers/{email}', 'ApiController@get_all_customers')->name('get_all_customers');



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


Route::get('assignstoc', ['as' => 'assignstoc', 'uses' => 'UsersController@assignstoc']);
Route::post('assignstoc', ['as' => 'assignstoc', 'uses' => 'UsersController@assignstoc_save']);
Route::get('assignstoc_manage', ['as' => 'assignstoc_manage', 'uses' => 'UsersController@assignstoc_manage']);
Route::get('show_customers/{id}', ['as' => 'show_customers', 'uses' => 'UsersController@show_customers']);
Route::get('unlink_customer/{id}/{cus}', ['as' => 'unlink_customer', 'uses' => 'UsersController@unlink_customer']);



Route::get('offers', ['as' => 'offers', 'uses' => 'OffersController@offers_index']);
Route::post('offers', ['as' => 'offers', 'uses' => 'OffersController@offers_index_save']);

Route::get('manage_offers', ['as' => 'manage_offers', 'uses' => 'OffersController@manage_offers']);
Route::get('delete_offer/{id}', ['as' => 'delete_offer', 'uses' => 'OffersController@delete_offer']);



Route::get('orders', ['as' => 'orders', 'uses' => 'OrdersController@orders']);
Route::get('view_orders/{id}', ['as' => 'view_orders', 'uses' => 'OrdersController@view_orders']);






























 });