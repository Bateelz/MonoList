<?php

use App\Http\Controllers\DashbordUser\Auth\AppleLoginController;
use App\Http\Controllers\DashbordUser\Auth\ForgetPasswordController;
use App\Http\Controllers\DashbordUser\Auth\LoginController;
use App\Http\Controllers\DashbordUser\Auth\RegisterController;
use App\Http\Controllers\DashbordUser\Auth\SocialController;
use App\Http\Controllers\DashbordUser\User\UserController;
use App\Http\Controllers\DashbordUser\User\UserListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'Login'])->name('login');
Route::get('register', [RegisterController::class, 'index']);
Route::post('Registration', [RegisterController::class, 'Registration'])->name('Registration');
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('forget')->name('forget.')->group(function()
{
    Route::get('/',[ForgetPasswordController::class,'index']);
    Route::post('forget',[ForgetPasswordController::class,'forget'])->name('checkuser');
    Route::get('resetpassword/{token}',[ForgetPasswordController::class,'showResetPasswordForm'])->name('returnformupdate');
    Route::post('update',[ForgetPasswordController::class,'forget'])->name('updatepassword');
    Route::post('updatepassword',[ForgetPasswordController::class,'submitResetPasswordForm'])->name('submitResetPasswordForm');
});

Route::prefix('social')->group(function () {
    Route::get('auth/{driver}', [SocialController::class, 'redirectSocialite']);
    Route::get('auth/callback/{driver}', [SocialController::class, 'handleCallback']);
    Route::get('apple/login',[AppleLoginController::class,'appleLogin']);
});

Route::prefix('list')->name('list.')->middleware('auth')->group(function () {
    Route::get('/', [UserListController::class,'index'])->name('index');
    Route::get('list', [UserListController::class,'list'])->name('list');
    Route::get('create', [UserListController::class,'create'])->name('create');
    Route::post('store',[UserListController::class,'store'])->name('store.list');
    Route::post('addItem/{id}',[UserListController::class,'addItem'])->name('addItem');
    Route::post('editItem/{id}',[UserListController::class,'editItem'])->name('editItem');
    Route::get('destoryItem/{id}',[UserListController::class,'destoryItem'])->name('destoryItem');
    Route::get('delete/{id}',[UserListController::class,'delete'])->name('delete');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('root');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
});
