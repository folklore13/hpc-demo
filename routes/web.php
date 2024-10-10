<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'home']);
    Route::middleware('can:manage-data')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::post('/categories', 'store');
            Route::put('/categories/{category}', 'update');
            Route::delete('/categories/{category}', 'destroy');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::post('/products', 'store');
            Route::put('/products/{product}', 'update');
            Route::delete('/products/{product}', 'destroy');
        });

        Route::get('/users', [DashboardController::class, 'users']);
    });
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/logout', LogoutController::class);
});

Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);
Route::get('/register', [DashboardController::class, 'register']);