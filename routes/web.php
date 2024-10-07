<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

Route::post('/products', [ProductController::class, 'create']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
Route::get('/products', [ProductController::class, 'browse']);

Route::post('/categories', [CategoryController::class, 'create']);
Route::get('/categories', [CategoryController::class, 'browse']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return response()->json(['token' => $token]);
});

Route::get('/', function () {
    return view('welcome');
});
