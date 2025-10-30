<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AdminController::class, 'show']);
// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
  Route::get('list',  [AdminController::class, 'list']);
  Route::get('table/list', [AdminController::class, 'adminTable'])->name('list.table');
  Route::post('store', [AdminController::class, 'store']);
  Route::get('edit', [AdminController::class, 'edit']);
  Route::get('delete/{id}', [AdminController::class, 'delete']);
});
