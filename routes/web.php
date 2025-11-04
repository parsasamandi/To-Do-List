<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\PersonalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Homepage — show study list
Route::get('/', [StudyController::class, 'list']);

// Study CRUD routes
Route::prefix('study')->name('study.')->group(function () {
  // Blade page with DataTable
  Route::get('list', [StudyController::class, 'list'])->name('list');
  // DataTable AJAX endpoint
  Route::get('table/list', [StudyController::class, 'studyTable'])->name('list.table');
  // Store or update a task
  Route::post('store', [StudyController::class, 'store'])->name('store');
  // Edit task
  Route::get('edit', [StudyController::class, 'edit'])->name('edit');
  // Delete task
  Route::get('delete/{id}', [StudyController::class, 'delete'])->name('delete');
});

Route::prefix('personal')->name('personal.')->group(function () {
  Route::get('/list', [PersonalController::class, 'list'])->name('list');
  Route::get('/table', [PersonalController::class, 'personalTable'])->name('list.table');
  Route::post('/store', [PersonalController::class, 'store'])->name('store');
  Route::get('/edit', [PersonalController::class, 'edit'])->name('edit');
  Route::get('/delete/{id}', [PersonalController::class, 'delete'])->name('delete');
});


