<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\frontController@index');


Route::get('category', 'App\Http\Controllers\frontController@category');

Route::get('post', 'App\Http\Controllers\frontController@post');

Route::get('admin', 'App\Http\Controllers\adminController@index');


Route::get('viewcategory', 'App\Http\Controllers\adminController@viewCategory');

Route::post('addcategory','App\Http\Controllers\crudController@insertData');

Route::get('editcategory/{id}' , 'App\Http\Controllers\adminController@editcategory');

Route::post('editcategory/{id}','App\Http\Controllers\crudController@updateData');

Route::post('multipledelete', 'App\Http\Controllers\adminController@multipleDelete');
