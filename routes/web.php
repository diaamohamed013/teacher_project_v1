<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment/success', [PaymentController::class, 'success']);
Route::get('/payment/fail', [PaymentController::class, 'fail']);
Route::get('/payment/pending', [PaymentController::class, 'pending']);

Route::resource('/grades', GradeController::class);
Route::resource('/courses', CourseController::class);
Route::get('/students', [StudentController::class,'index'])->name('students.index');

