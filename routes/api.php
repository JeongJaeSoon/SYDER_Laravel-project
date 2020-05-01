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

Route::middleware('auth:admin')->get('/admin', function (Request $request) {
    return $request->user();
});

Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::prefix('register')->group(function () {
    Route::post('admins', 'AdminController@adminRegister');
    Route::post('users', 'UserController@userRegister');
});

Route::prefix('waypoints')->group(function () {
    Route::get('/', 'WaypointController@waypointIndex');
    Route::post('/', 'WaypointController@waypointStore');
    Route::patch('/{waypoint}', 'WaypointController@waypointUpdate');
    Route::delete('/{waypoint}', 'WaypointController@waypointDestroy');
});

Route::get('order/show', 'OrderController@orderShow');
Route::post('order/register', 'OrderController@orderRegister');

Route::get('user/requestReceiverInfo', 'UserController@receiverIndex');
