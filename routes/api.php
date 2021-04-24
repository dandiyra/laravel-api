<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();




});
// register
Route::post('/register', [LoginController::class,'register']);
// login
Route::post('/login', [LoginController::class,'index']);
// logout
Route::get('/logout', [LoginController::class,'logout']);
// Menampilkan List User
Route::middleware('auth:sanctum')->get('/user', [UserController::class,'index']);
// Input Data Tambah User
Route::middleware('auth:sanctum')->post('/user/store', [UserController::class,'store']);
// Update User Berdasarkan ID
Route::middleware('auth:sanctum')->post('/user/update/{id}', [UserController::class, 'update']);
// Delete User
Route::middleware('auth:sanctum')->delete('/user/delete/{id}', [UserController::class, 'delete']);