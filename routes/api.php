<?php

use Illuminate\Http\Request;

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

// list categories
Route::get('categories', 'CategoryController@loadCategory');

// list single category
Route::get('category/{id}', 'CategoryController@show');

// create new category
Route::post('category', 'CategoryController@store');

// update category
Route::put('category', 'CategoryController@store');

// list categories
Route::delete('category/{id}', 'CategoryController@destroy');

// list items
Route::get('categories', 'CategoryController@index');

// list single item
Route::get('category/{id}', 'CategoryController@show');

// create new item
Route::post('category', 'CategoryController@store');

