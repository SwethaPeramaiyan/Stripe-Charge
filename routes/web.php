<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Products page related routes
    Route::get('/products', [ProductsController::class, 'get_products'])->name('products');
    Route::get('/view/product/{id}', [ProductsController::class, 'view_product']);   
    Route::post('/stripe/payment', [PaymentController::class, 'stripe_payment'])->name('stripe-payment');
});
