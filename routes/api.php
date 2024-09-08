<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories', [ApiController::class, 'getCategories'])->name('api:categories');
Route::get('product/{id}', [ApiController::class, 'getProductByCategory'])->name('api:product');
