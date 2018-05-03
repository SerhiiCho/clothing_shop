<?php

use Illuminate\Http\Request;

/**
 * These routes are loaded by the RouteServiceProvider
 * within a group which is assigned the "api" middleware group
 */

Route::get('items/{sex?}', 'Api\ApiItemController@index');
Route::get('random', 'Api\ApiItemController@random');
Route::get('popular', 'Api\ApiItemController@popular');
Route::get('item/{item}', 'Api\ApiItemController@show');
Route::post('item', 'Api\ApiItemController@store');
Route::put('item/{id}', 'Api\ApiItemController@edit');
Route::delete('item/{id}', 'Api\ApiItemController@destroy');

// Messages
Route::get('clients_orders/index', 'Api\ApiMessageController@index');
Route::post('clients_orders/store', 'Api\ApiMessageController@store');
Route::delete('clients_orders/destroy/{id}', 'Api\ApiMessageController@destroy');
