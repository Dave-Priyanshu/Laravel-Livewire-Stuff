<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/livewire',function(){
    return view('livewireTUT');
})->name('livewireTUT');

Route::get('/livewire/todo',function(){
    return view('todoList');
})->name('livewire.todo');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/makeadmin/{id}',[AuthController::class,'makeAdmin'])->name('make.admin');

    // update user details
    Route::post('/user/update',[UserProfileController::class,'updateUser'])->name('user.update');
    // delete user
    Route::post('/user/delete{id}',[UserProfileController::class,'deleteUser'])->name('user.delete');
});

Route::middleware('guest')->group(function(){

    Route::get('/register',[AuthController::class,'showRegistratinoForm'])->name('register');
    Route::post('/register',[AuthController::class,'register']);
    Route::get('/user/login',[AuthController::class,'showUserLoginForm'])->name('user.login');
    Route::post('/user/login',[AuthController::class,'userLogin']);
    Route::get('/admin/login',[AuthController::class,'showAdminLoginForm'])->name('admin.login');
    Route::post('/admin/login',[AuthController::class,'adminLogin']);
});
