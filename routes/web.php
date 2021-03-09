<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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

Route::group(['prefix' => 'cart'], function () {
    Route::post('/add', [CartController::class, 'addProductInCart'])->name('cart.add');
    Route::post('/update', [CartController::class, 'setCartProductQuantity'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'removeProductFromCart'])->name('cart.remove');
    Route::get('/get', [CartController::class, 'getUserCart'])->name('cart.get');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
