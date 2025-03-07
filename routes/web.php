<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionDetailController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/course/{course}', [CourseController::class,'show'])->name('courses.show');
Route::get('/grade/{grade}', [GradeController::class,'show'])->name('grades.show');



Route::group(['middleware' => ['auth',teacher::class]], function ()
{
    Route::get('/students', [StudentController::class,'index'])->name('students.index');

    Route::resource('/courses', CourseController::class)->except(['show']);
    Route::resource('/grades', GradeController::class)->except(['show']);



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/section/create',[SectionController::class,'create'])->name('section.create');
    Route::post('/section',[SectionController::class,'store'])->name('section.store');
    Route::put('/section/{section}',[SectionController::class,'update'])->name('section.update');


    Route::post('/section_details',[SectionDetailController::class,'store'])->name('section_details.store');
    Route::get('/section_details/{detail}/edit',[SectionDetailController::class,'edit'])->name('section_details.edit');
    Route::put('/section_details/{detail}',[SectionDetailController::class,'update'])->name('section_details.update');
    Route::get('/section_details/create',[SectionDetailController::class,'create'])->name('section_details.create');
});


Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/success', [PaymentController::class, 'success']);
    Route::get('/payment/fail', [PaymentController::class, 'fail']);
    Route::get('/payment/pending', [PaymentController::class, 'pending']);
});
