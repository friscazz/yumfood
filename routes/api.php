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
Route::prefix('v1')->group(function () {
    Route::apiResource('vendors', 'VendorController');
    Route::post('vendors',  'VendorController@store');
    Route::put('vendors/{id}',  'VendorController@update');
    Route::delete('vendors/{id}',  'VendorController@destroy');
});


