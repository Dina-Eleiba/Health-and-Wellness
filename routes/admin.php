<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
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

