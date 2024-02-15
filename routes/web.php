<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [ProductController::class, 'index'])->name('home');

Route::middleware("auth")->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name("products");
    Route::get('products/{id}', [ProductController::class, 'show'])->name("products.show");
    Route::post('subscription', [ProductController::class, 'subscription'])->name("subscription.create");
    Route::get('subscriptionsuccess', [ProductController::class, 'subscriptionSuccess'])->name("subscription.success");
});