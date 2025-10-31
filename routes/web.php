<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;

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

Route::get('/', [StudyController::class, 'show']);
// Study
Route::group(['prefix' => 'study', 'as' => 'study.'], function() {
  Route::get('list',  [StudyController::class, 'list']);
  Route::get('table/list', [StudyController::class, 'studyTable'])->name('list.table');
  Route::post('store', [StudyController::class, 'store']);
  Route::get('edit', [StudyController::class, 'edit']);
  Route::get('delete/{id}', [StudyController::class, 'delete']);
});
