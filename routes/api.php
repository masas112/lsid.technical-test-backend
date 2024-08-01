<?php

use App\Http\Controllers\C_todoapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::apiResource('todoapp', C_todoapp::class);
Route::get('/index', [C_todoapp::class, 'index']);
Route::post('/store', [C_todoapp::class, 'store']);
Route::get('/show/{id}', [C_todoapp::class, 'show']);
Route::put('/update/{id}', [C_todoapp::class, 'update']);
Route::delete('/destroy/{id}', [C_todoapp::class, 'destroy']);
