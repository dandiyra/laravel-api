<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);

//Movies
Route::get('movies', [MovieController::class, 'show']);
Route::get('movies/:id', [MovieController::class, 'getById']);
Route::post('movies', [MovieController::class, 'store']);
Route::put('movies/:id', [MovieController::class, 'update']);
Route::delete('movies/:id', [MovieController::class, 'destroy']);


Route::group(['middleware' => 'auth:api'], function () {
    //User
    Route::post('user', [UserController::class, 'Store']);
    Route::put('user', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'destroy']);
    Route::get('user', [UserController::class, 'show']);
    Route::get('user/id', [UserController::class, 'getById']);

});
