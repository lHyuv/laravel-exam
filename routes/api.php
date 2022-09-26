<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/category/{category}', [ProductController::class, 'find_by_category']);

Route::middleware('auth:sanctum')->get('/products/{id}', [ProductController::class, 'show']);

Route::middleware('auth:sanctum')->post('/products',[ProductController::class, 'create']);

Route::middleware('auth:sanctum')->put('/products/{id}', [ProductController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/products/{id}', [ProductController::class, 'delete']);
