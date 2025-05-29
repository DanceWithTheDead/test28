<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CarController;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/cars', [CarController::class, 'store']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{car}', [CarController::class, 'show']);
