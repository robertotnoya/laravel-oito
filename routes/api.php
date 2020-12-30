<?php

use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::get('me', [AuthController::class, 'getAuthenticatedUser']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:api'
], function () {    
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
});
