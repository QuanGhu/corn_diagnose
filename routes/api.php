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

Route::group(['prefix' => 'disease'], function () {
    Route::get('/','DiseaseController@index');
    Route::post('/store','DiseaseController@store');
    Route::put('/store','DiseaseController@update');
    Route::delete('/delete', 'DiseaseController@delete');
});

Route::group(['prefix' => 'cause'], function () {
    Route::get('/','CauseController@index');
    Route::post('/store','CauseController@store');
    Route::put('/store','CauseController@update');
    Route::delete('/delete', 'CauseController@delete');
});