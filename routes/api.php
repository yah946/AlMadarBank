<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutConroller;
use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('guest')->group(function(){
    Route::post('register',RegisterController::class);
    Route::post('login',[LoginController::class,'login']);
});

Route::middleware('auth:api')->group(function(){
    Route::get('logout',LogoutConroller::class);
});
