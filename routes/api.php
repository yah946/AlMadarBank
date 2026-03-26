<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutConroller;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\DespositController;
use App\Http\Controllers\API\TransferController;
use App\Http\Controllers\API\WithdrawController;
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

    Route::prefix('accounts')->group(function(){
        Route::get('/',[AccountController::class,'index']);
        Route::get('{id}',[AccountController::class,'show']);
        Route::post('{id}/co-owners',[AccountController::class,'AddCoOwner']);
        Route::delete('{id}/co-owners/{userId}',[AccountController::class,'RemoveCoOwner']);
        Route::patch('{id}/convert',[AccountController::class,'CvtAccount']);
        Route::post('/',[AccountController::class,'store']);
    });

    Route::post('transfers',[TransferController::class,'store']);
    Route::post('withdraws',[WithdrawController::class,'store']);
    Route::post('desposits',[DespositController::class,'store']);
});
