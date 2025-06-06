<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FlowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('customers', CustomerController::class);
Route::apiResource('flowers', FlowerController::class);
Route::post('login', [CustomerController::class, 'login']);