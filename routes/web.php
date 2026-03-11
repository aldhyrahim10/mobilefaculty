<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\DocumentationController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/loginaction', [AuthController::class, 'loginAction'])->name('login-action');
Route::post('/logout', [AuthController::class, 'logoutAction'])->name('logout-action');
Route::get('/instructor', [FrontController::class, 'instructor'])->name('instructor-front');
Route::get('/documentation', [FrontController::class, 'documentation'])->name('documentation-front');
Route::get('/lesson', [FrontController::class, 'lesson'])->name('lesson-front');
Route::get('/academic', [FrontController::class, 'academic'])->name('academic-front');
Route::get('/tags/{tag}', [FrontController::class, 'tags'])->name('tags-front');



Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('pages.home');
    })->name('dashboard');
    Route::get('/admin/instructors', [InstructorController::class, 'index'])->name('instructor');
    Route::get('/admin/documentations', [DocumentationController::class, 'index'])->name('documentation');
    Route::get('/admin/lessons', [LessonController::class, 'index'])->name('lesson');
    Route::get('/admin/academic', [AcademicController::class, 'index'])->name('academic');
});



Route::post('/data/add-instructor', [InstructorController::class, 'store'])->name('add-instructor');
Route::get('/data/get-one-instructor', [InstructorController::class, 'getOneData'])->name('get-one-instructor');
Route::patch('/data/update-instructor/{id}', [InstructorController::class, 'update'])->name('update-instructor');
Route::delete('/data/delete-instructor/{id}', [InstructorController::class, 'destroy'])->name('delete-instructor');

Route::post('/data/add-documentation', [DocumentationController::class, 'store'])->name('add-documentation');
Route::get('/data/get-one-documentation', [DocumentationController::class, 'getOneData'])->name('get-one-documentation');
Route::patch('/data/update-documentation/{id}', [DocumentationController::class, 'update'])->name('update-documentation');
Route::delete('/data/delete-documentation/{id}', [DocumentationController::class, 'destroy'])->name('delete-documentation');

Route::post('/data/add-lesson', [LessonController::class, 'store'])->name('add-lesson');
Route::get('/data/get-one-lesson', [LessonController::class, 'getOneData'])->name('get-one-lesson');
Route::patch('/data/update-lesson/{id}', [LessonController::class, 'update'])->name('update-lesson');
Route::delete('/data/delete-lesson/{id}', [LessonController::class, 'destroy'])->name('delete-lesson');

Route::post('/data/add-academic', [AcademicController::class, 'store'])->name('add-academic');
Route::get('/data/get-one-academic', [AcademicController::class, 'getOneData'])->name('get-one-academic');
Route::patch('/data/update-academic/{id}', [AcademicController::class, 'update'])->name('update-academic');
Route::delete('/data/delete-academic/{id}', [AcademicController::class, 'destroy'])->name('delete-academic');

Route::get('/{slug}', [FrontController::class, 'detail'])->name('detail-front');