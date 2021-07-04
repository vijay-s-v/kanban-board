<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;

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

Route::get('/categories', [CategoryController::class, 'index']);
Route::prefix('/category')->group(function(){
	Route::post('/store', [CategoryController::class, 'store']);
	Route::put('/{id}', [CategoryController::class, 'update']);
	Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::get('/cards', [CardController::class, 'index']);
Route::prefix('/card')->group(function(){
	Route::post('/store', [CardController::class, 'store']);
	Route::put('/{id}', [CardController::class, 'update']);
	Route::delete('/{id}', [CardController::class, 'destroy']);
});