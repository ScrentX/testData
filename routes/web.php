<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/students/madali', [StudentController::class, 'madali']);
Route::get('/students/medjo', [StudentController::class, 'medjo']);
Route::get('/students/mahirap', [StudentController::class, 'mahirap']);

Route::get('/table', [StudentController::class, 'DisplaydataUsingJs'])->name('table');
Route::get('/table-data',[StudentController::class,'fronteEndDisplay']);



