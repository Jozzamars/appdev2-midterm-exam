<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\TokenCheckerMiddleware;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('products', ProductController::class);

//export PATH=/opt/lampp/bin:$PATH to access php



Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);

Route::apiResource('products', ProductController::class);
Route::post('/api/upload/local', [ProductController::class, 'uploadImageLocal']);
Route::post('/api/upload/public', [ProductController::class, 'uploadImagePublic']);



//GET route
Route::get('/get', function () {
	return response()->json(['message' => 'GET request handled.']);
})->middleware(TokenCheckerMiddleware::class);

// POST route
Route::post('/post', function () {
	return response()->json(['message' => 'POST request handled.']);
})->middleware(TokenCheckerMiddleware::class);

// PUT route
Route::put('/put', function () {
	return response()->json(['message' => 'PUT request handled.']);
})->middleware(TokenCheckerMiddleware::class);

// PATCH route
Route::patch('/patch', function () {
	return response()->json(['message' => 'PATCH request handled.']);
})->middleware(TokenCheckerMiddleware::class);

// DELETE route
Route::delete('/delete', function () {
	return response()->json(['message' => 'DELETE request 
    handled.']);
})->middleware(TokenCheckerMiddleware::class);


