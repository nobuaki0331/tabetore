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

// Route::get('/', function () {
//     return view('layouts.app');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/newitem', 'NewItemController@index')->name('newitem');
Route::get('/item', 'NewItemController@index')->name('newitem');
Route::get('/post', 'NewItemController@index')->name('newitem');
Route::get('/gallery', 'NewItemController@index')->name('newitem');
Route::get('/movie', 'NewItemController@index')->name('newitem');

