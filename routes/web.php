<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', HomeController::class)->name('home');

Route::middleware([])->get('/courses', [CourseController::class,'index'])->name('courses.index');

Route::middleware([])->get('/courses/{course}',[CourseController::class,'show'])->name('courses.show');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
