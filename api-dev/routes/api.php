<?php

use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('items',[ItemController::class, 'index']);
Route::get('items/{id}',[ItemController::class, 'show']);
Route::post('items',[ItemController::class, 'store']);
Route::put('items/{id}',[ItemController::class, 'update']);
Route::delete('items/{id}',[ItemController::class, 'destroy']);
