<?php

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

Route::get('/', function () {
    return view('welcome');

   
});

 //Student Route
 Route::get('/students', [\App\Http\controllers\StudentController::class, 'index'])->name('student.index');
 Route::get('/student/add', [\App\Http\controllers\StudentController::class, 'add'])->name('test.add');
 Route::post('/student/store', [\App\Http\controllers\StudentController::class, 'store'])->name('student.store');
 Route::get('/table/student', [\App\Http\controllers\StudentController::class, 'dataTable'])->name('table.student');
 Route::get('/student/show/{id}', [\App\Http\controllers\StudentController::class, 'show'])->name('student.show');
 Route::get('/student/edit/{id}', [\App\Http\controllers\StudentController::class, 'edit'])->name('student.edit');
 Route::post('/student/update/{id}', [\App\Http\controllers\StudentController::class, 'update'])->name('student.update');
 Route::get('/delete-student/{id}', [\App\Http\controllers\StudentController::class, 'delete'])->name('student.delete');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
