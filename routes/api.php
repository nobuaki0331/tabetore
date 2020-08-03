<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api'], function() {
    Route::get('item', 'PostController@index');
    Route::get('item/keywords', 'PostController@apiIndex');
    Route::get('item/{id}', 'PostController@show');
    Route::post('post', 'PostController@store');
    Route::post('post/upload', 'PostController@storeUpload');
    Route::get('mypage/post/{userid}', 'MypageController@apiIndex');
    Route::post('mypage/{id}', 'MypageController@update');
    Route::delete('mypage/post/{postId}', 'MypageController@apiDestroy');
});
