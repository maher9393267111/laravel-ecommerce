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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/productDetails/{category_slug}/{product_slug}', 'productDetail');
    Route::get('thank-you', 'thankyou');
    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('search', 'searchProduct');
});



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


// Product Controller

Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/products',  'index');
    Route::get('/products/create', 'create');
    Route::post('/products', 'store');
     Route::get('/products/{id}/edit', 'edit');
     Route::put('/products/{id}', 'update');
     Route::get('/products/delete/{id}', 'delete');
     Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
     Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
     Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
});


 // cilors controller
 Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
    Route::get('/colors', 'index');
    Route::get('/colors/create', 'create');
    Route::post('/colors/create', 'store');
    Route::get('/colors/{color}/edit', 'edit');
    Route::put('/colors/{color_id}', 'update');
    Route::get('/colors/{color_id}/delete','destroy');
});



// slider Controller

   /// sliders  routes
   Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
    Route::get('/sliders',  'index');
    Route::get('/sliders/create', 'create');
    Route::post('/sliders', 'store');
    Route::get('/sliders/{id}/edit', 'edit');
    Route::put('/sliders/{id}', 'update');
    Route::get('/sliders/delete/{id}', 'delete');
});








});