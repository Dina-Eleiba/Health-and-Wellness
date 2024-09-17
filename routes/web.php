<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Store\BlogController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\ShopController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'AboutPage'])->name('home.about');
Route::get('/categories/{slug}', [ShopController::class, 'index'])->name('home.shop');
Route::get('/categories/{category}/{subcategory}', [ShopController::class, 'shopByCategory'])
->name('home.shop.products');

Route::get('/categories/{category}/{subcategory}/products/{slug}', [ShopController::class, 'ProductDetails'])
->name('home.shop.product-details');

Route::get('/cart', [CartController::class, 'viewCart'])
->name('home.cart');
Route::post('/cart', [CartController::class, 'addToCart'])
->name('home.add-to-cart');
Route::delete('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])
->name('home.remove-from-cart');

Route::get('/contact-us', [HomeController::class, 'contactUs'])
->name('home.contact-us');


Route::get('/blog', [BlogController::class, 'index'])->name('home.blog');

Route::get('/blog/{slug}', [BlogController::class, 'blog_details'])->name('home.blog-details');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
