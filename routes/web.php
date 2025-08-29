<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){


    Route::get('/loginpage', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
});


Route::middleware('auth')->group(function(){
    
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::put('/register/{user}', [RegisterController::class, 'updateStatus'])->name('register.status_update');
    Route::delete('/register/{user}', [RegisterController::class, 'deleteUser'])->name('register.delete');
    Route::post('/register/{user}', [RegisterController::class, 'resetPassword'])->name('register.reset_password');
    //auth
    Route::get('/roles', [RolesController::class,'roles'])->name('roles');
    Route::post('/roles', [RolesController::class,'store'])->name('roles.store');
    Route::put('/roles/{role}', [RolesController::class,'update'])->name('roles.update');


    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('product', ProductController::class);
    Route::post('product/fetch', [ProductController::class, 'productById'])->name('product.byId');
    Route::resource('category', CategoryController::class);

    Route::get('stocks', [StockController::class, 'index'])->name('stocks');
    Route::post('stocks', [StockController::class, 'store'])->name('stocks.store');
    Route::delete('stocks', [StockController::class, 'destroy'])->name('stocks.destroy');
    Route::put('stocks/quantity/{stock}', [StockController::class, 'updateQuantity'])->name('stocks.updateQuantity');
    Route::put('stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');

    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    Route::post('sales', [SalesController::class, 'store'])->name('sales.store');
});
