<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

//auth
Route::get('register',[AuthController::class, 'register_form']);
Route::post('register',[AuthController::class, 'register']);
Route::get('login',[AuthController::class, 'login']);
Route::post('login',[AuthController::class, 'authenticate']);
Route::get('logout',[AuthController::class, 'logout']);


//content
Route::get('/',[PostController::class, 'index']);
Route::get('create',[PostController::class, 'create']);
Route::post('/',[PostController::class, 'store']);
Route::delete('{id}/destroy',[PostController::class, 'destroy']);
Route::get('{id}/edit',[PostController::class, 'edit']);
Route::patch('{id}',[PostController::class, 'update']);
