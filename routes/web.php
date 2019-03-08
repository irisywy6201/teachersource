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

Route::get('/', 'homeController@index');
Route::get('issue/{id}', 'homeController@show');
//後台
  Auth::routes();
  Route::get('admin', 'adminController@index');
  Route::resource('category', 'categoryController');
  Route::resource('admin/issue', 'issueController');
  Route::resource('admin/management', 'managementController');
  Route::resource('admin/user', 'userController');
