<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class,'index'])->middleware(['can:ver dashboard'])->name('home');

Route::resource('roles',RoleController::class)->names('roles');

Route::resource('users',UserController::class)->names('users');

