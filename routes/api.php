<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::post('/products', [ProductController::class, 'create']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
Route::get('/products', [ProductController::class, 'browse']);

Route::post('/categories', [CategoryController::class, 'create']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);
