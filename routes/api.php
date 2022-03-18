<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\DashbordUser\User\UserController;
use App\Http\Controllers\DashbordUser\User\UserListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace("Api")->group(function(){
  Route::prefix('auth')->group(function(){
      Route::post('login',[LoginController::class,'login']);
      Route::post('register',[LoginController::class,'register']);
  });


  Route::prefix('list')->middleware(['auth:api','CheckUserStatus'])->group(function () {
    Route::get('list', [UserListController::class,'list']);
    Route::post('store',[UserListController::class,'store_list']);
    Route::post('addItem/{id}',[UserListController::class,'addItem']);
    Route::post('editItem/{id}',[UserListController::class,'editItem']);
    Route::get('destoryItem/{id}',[UserListController::class,'destoryItem']);
    Route::get('delete/{id}',[UserListController::class,'delete']);
    Route::post('rename/{id}',[UserListController::class,'editname']);
    Route::get('is_complete/{item}',[UserListController::class,'is_complete']);
    Route::get('get_link_list/{list_id}',[UserListController::class,'get_link_list']);
});

Route::prefix('user')->middleware(['auth:api','CheckUserStatus'])->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('update_profile', [UserController::class, 'updateProfile']);
    Route::post('update_password', [UserController::class, 'updatePassword']);
});

});

