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

Route::post('/geturl','ApiController@index');
Route::get('/geturl','ApiController@index');
Route::post('/postflight','moviesController@submitMovies');
Route::get('/postflight','moviesController@submitMovies');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
