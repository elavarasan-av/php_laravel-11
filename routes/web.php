<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;


Route::get('/dashbord', [AdminController::class, 'index'])->name('home');
Route::get('/category/create', [AdminController::class, 'addCategory'])->name('catAdd');
Route::post('/category/store', [AdminController::class, 'CateStore'])->name('catStored');
Route::get('/category/details/{id}', [AdminController::class, 'CateDetails'])->name('catshow');
Route::get('category/edit/{id}', [AdminController::class, 'CateEdit'])->name('catEdit');
Route::put('category/update/{id}', [AdminController::class, 'CateUpdate'])->name('catupdate');
Route::delete('category/delete/{id}', [AdminController::class, 'cateDelete'])->name('catDelete');

Route::get('/product/lists', [AdminController::class, 'ProdList'])->name('product.list');
Route::get('/product/create/', [AdminController::class, 'ProdCreate'])->name('product.create');
Route::post('/product/store', [AdminController::class, 'ProdStore'])->name('product.save');
Route::get('/product/details/{id}/', [AdminController::class, 'ProdDetails'])->name('product.details');
Route::get('/product/edit/{id}/', [AdminController::class, 'ProdEdit'])->name('product.edit');
Route::put('/product/update/{id}/', [AdminController::class, 'ProdUpdate'])->name('product.upadte');
Route::delete('/product/delete/{id}/', [AdminController::class, 'ProdDelete'])->name('product.delete');

Route::get('order/status', [AdminController::class, 'OrderStatus'])->name('orderstatus');
Route::put('order/update/', [AdminController::class, 'OrderUpdate'])->name('orderupdate');




Route::get('/', [UserController::class, 'UserIndex'])->name('default');
Route::get('/user/login', [UserController::class, 'Login'])->name('login');
Route::get('user/registration', [UserController::class, 'Registration'])->name('registration');
Route::post('/user/stored/', [UserController::class, 'Signup'])->name('user.stored');
Route::post('/user/log/verification/', [UserController::class, 'Signin'])->name('logver');
Route::get('/logout', [UserController::class, 'Logout'])->name('logout');
Route::get('/user/about', [UserController::class, 'About'])->name('about');
Route::get('/user/products/{id}', [UserController::class, 'Products'])->name('products');
Route::get('/user/cart', [CartController::class, 'Cart'])->name('cart');
Route::post('/user/addcart', [CartController::class, 'AddCart'])->name('addtocart');
Route::get('/user/products/details/{id}', [UserController::class, 'Details'])->name('details');
Route::get('user/cart/show/{id}', [CartController::class, 'CartShow'])->name('cartshow');
Route::put('user/cart/update/{id}', [CartController::class, 'CartUpdate'])->name('cartupdate');
Route::delete('user/cart/delete/{id}', [CartController::class, 'Cartdelete'])->name('cartdestroyed');
Route::get('user/cart/payment', [CartController::class, 'Payment'])->name('payment');
Route::post('user/cart/checkout', [CartController::class, 'Checkout'])->name('checkout');
Route::get('user/details', [UserController::class, 'Profile'])->name('profile');

Route::get('user/invoice/pdf', [CartController::class, 'Invoice'])->name('invoice');
Route::get('pdf', [CartController::class, 'PDF'])->name('pdf');
