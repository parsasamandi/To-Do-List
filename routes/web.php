<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;

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
  Route::get('edit/{id}', [StudyController::class, 'edit'])->name('edit');
  // Delete task
  Route::delete('delete/{id}', [StudyController::class, 'delete'])->name('delete');
});
