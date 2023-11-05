<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [HomeController::class,'home']);

/*Category*/ 
Route::get('/view_category', [AdminController::class,'view_category']);
Route::post('/add_category', [AdminController::class,'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

/*Product*/ 
Route::get('/view_product', [AdminController::class,'view_product']);
Route::post('/add_product', [AdminController::class,'add_product']);
Route::get('/show_product', [AdminController::class,'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');
Route::get('/product_detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');

/*Cart*/ 
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [HomeController::class,'show_cart']);
Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');
Route::get('/cash_order', [HomeController::class,'cash_order']);
Route::get('/stripe/{total_price}', [HomeController::class,'stripe']);
Route::post('stripe/{total_price}', [HomeController::class,'stripePost'])->name('stripe.post');

/*Order*/
Route::get('/order', [AdminController::class,'order']);
Route::get('/delivered/{id}', [AdminController::class,'delivered']);
Route::get('/print/{id}', [AdminController::class,'print']);
Route::get('/search', [AdminController::class,'search']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('post', [HomeController::class, 'post'])->middleware(['auth','admin']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Shopping Cart
Route::get('/shoppingcart', [ProductController::class, 'index'])->middleware(['auth','admin']);
Route::get('/shoppingcart/create', [ProductController::class,'create']);
Route::post('/shoppingcart/create', [ProductController::class,'store']);

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
 

Route::get('detailpro/{id}', [ProductController::class, 'detail'])->name('detailpro');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');*/

Route::get('seen-cart', [ProductController::class, 'seencart'])->name('seen-cart');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');



require __DIR__.'/auth.php';
