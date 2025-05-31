<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'create']);
Route::patch('/customer/{customer}', [CustomerController::class, 'update']);
Route::delete('customer/{customer}', [CustomerController::class, 'destroy']);
Route::post('login', [CustomerController::class, 'login']);
