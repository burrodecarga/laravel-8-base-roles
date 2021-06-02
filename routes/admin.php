<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

Route::get('', [HomeController::class,'index'])->middleware([])->name('home');

Route::resource('roles',RoleController::class)->names('roles');

Route::resource('users',UserController::class)->names('users');

Route::get('courses', [CourseController::class,'index'])->middleware([])->name('courses');

Route::get('courses/{course}', [CourseController::class,'show'])->middleware([])->name('courses.show');

Route::post('courses/{course}', [CourseController::class,'aproved'])->middleware([])->name('courses.aproved');






