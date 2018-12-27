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
    return view('dashboard');
})->middleware('auth');



Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::get('/products-management', 'ProductController@index');

Route::resource('products-management', 'ProductController');
Route::post('products-management/search', 'ProductController@search')->name('products-management.search');
//retourning categories
Route::resource('system-management/category', 'CategoryController');
Route::post('system-management/category/search', 'CategoryController@search')->name('category.search');

//return tables
Route::resource('system-management/tables', 'TableController');
Route::post('system-management/tables/search', 'TableController@search')->name('table.search');
Route::get('avatars/{name}', 'ProductController@load');