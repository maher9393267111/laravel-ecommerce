<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\CategoryController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ->middleware(['auth', 'isAdmin'])->

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
 


  //  Route::resource('/category', CategoryController::class);


  Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('/category',  'index');
    Route::get('/category/create', 'create');
    Route::post('/category', 'store');
    Route::get('/category/{id}/edit', 'edit');
    Route::put('/category/{id}', 'update');
    Route::get('/category/delete/{id}', 'delete');
});


// Brands Controller

Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
    Route::get('/brand',  'index');
     Route::get('/brand/create', 'create');
     Route::post('/brand', 'store');
     Route::get('/brand/{id}/edit', 'edit');
     Route::put('/brand/{id}', 'update');
     Route::get('/brand/delete/{id}', 'delete');
});







});