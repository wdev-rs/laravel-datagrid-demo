<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/',[ProductsController::class, 'index']);
Route::get('/{product}/edit',[ProductsController::class, 'edit']);
Route::get('/gridjs',[ProductsController::class, 'gridjs'])->name('gridjs');
Route::get('/datagrid',[ProductsController::class, 'datagrid'])->name('datagrid');
