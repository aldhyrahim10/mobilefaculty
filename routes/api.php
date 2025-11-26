<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DocumentationController;
use App\Http\Controllers\Admin\LessonController;

Route::post('/data/add-documentation', [DocumentationController::class, 'store'])->name('add-documentation-api');
Route::get('/data/get-one-documentation', [DocumentationController::class, 'getOneData'])->name('get-one-documentation-api');
Route::patch('/data/update-documentation/{id}', [DocumentationController::class, 'update'])->name('update-documentation-api');
Route::delete('/data/delete-documentation/{id}', [DocumentationController::class, 'destroy'])->name('delete-documentation-api');

Route::post('/data/add-lesson', [LessonController::class, 'store'])->name('add-lesson-api');
Route::get('/data/get-one-lesson', [LessonController::class, 'getOneData'])->name('get-one-lesson-api');
Route::patch('/data/update-lesson/{id}', [LessonController::class, 'update'])->name('update-lesson-api');
Route::delete('/data/delete-lesson/{id}', [LessonController::class, 'destroy'])->name('delete-lesson-api');