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

//Start Admin Section
Route::group(['namespace' => 'Api\Admin', 'prefix' => 'admin'], function () {

    //login user
    Route::post('auth', 'AuthController@login');

    //auth protected routes
    Route::group(['middleware' => 'auth:api'], function () {
        //create new product
        Route::post('products', 'ProductsController@store');
    });

});
//End Admin Section


