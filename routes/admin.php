<?php


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

Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

// **************************Users section*********************//

Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('dashboard.create-user');
Route::post('/dashboard/users/store', [UserController::class, 'store'])->name('dashboard.store-user');
Route::get('/dashboard/users/edit/{id}', [UserController::class, 'edit'])->name('dashboard.edit-user');
Route::put('/dashboard/users/edit/{id}', [UserController::class, 'update']);
Route::delete('/dashboard/users/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.delete-user');
