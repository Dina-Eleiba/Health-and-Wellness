<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SubcategoryController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// **************************Users section*********************//
Route::controller(UserController::class)->prefix('/dashboard/users')->name('dashboard.')
    ->group(function () {
        Route::get('/', 'index')->name('users');
        Route::get('/create', 'create')->name('create-user');
        Route::post('/store', 'store')->name('store-user');
        Route::get('/edit/{id}', 'edit')->name('edit-user');
        Route::put('/edit/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy')->name('delete-user');
    });

// **************************Categories section*********************//

    Route::controller(CategoryController::class)->prefix('/dashboard/categories')->name('dashboard.')
    ->group(function () {
        Route::get('/', 'index')->name('categories');
        Route::get('/create', 'create')->name('create-category');
        Route::post('/store', 'store')->name('store-category');
        Route::get('/edit/{id}', 'edit')->name('edit-category');
        Route::put('/edit/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy')->name('delete-category');
    });


// **************************SubCategories section*********************//

Route::controller(SubcategoryController::class)->prefix('/dashboard/subcategories')->name('dashboard.')
->group(function () {
    Route::get('/', 'index')->name('subcategories');
    Route::get('/create', 'create')->name('create-subcategory');
    Route::post('/store', 'store')->name('store-subcategory');
    Route::get('/edit/{id}', 'edit')->name('edit-subcategory');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy')->name('delete-subcategory');
});



// **************************Brands section*********************//

Route::controller(BrandController::class)->prefix('/dashboard/brands')->name('dashboard.')
->group(function () {
    Route::get('/', 'index')->name('brands');
    Route::get('/create', 'create')->name('create-brand');
    Route::post('/store', 'store')->name('store-brand');
    Route::get('/edit/{id}', 'edit')->name('edit-brand');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy')->name('delete-brand');
});


// **************************Products section*********************//

Route::controller(ProductController::class)->prefix('/dashboard/products')->name('dashboard.')
->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/create', 'create')->name('create-product');
    Route::post('/store', 'store')->name('store-product');
    Route::get('/edit/{id}', 'edit')->name('edit-product');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy')->name('delete-product');
});


// **************************Posts section*********************//

Route::controller(PostController::class)->prefix('/dashboard/posts')->name('dashboard.')
->group(function () {
    Route::get('/', 'index')->name('posts');
    Route::get('/create', 'create')->name('create-post');
    Route::post('/store', 'store')->name('store-post');
    Route::get('/edit/{id}', 'edit')->name('edit-post');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy')->name('delete-post');
});







