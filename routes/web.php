<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;

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



Route::get('/', [HomeController::class, 'index']);

// USERS ROUTES
Route::prefix('users')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index']); // List all users
    Route::post('/', [UserController::class, 'store']); // Create a new user
    Route::get('/{id}', [UserController::class, 'show']); // Get user details
    Route::put('/{id}', [UserController::class, 'update']); // Update user
    Route::delete('/{id}', [UserController::class, 'destroy']); // Delete user
});

// COMPANIES ROUTES
Route::prefix('companies')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CompanyController::class, 'index']); // List all companies
    Route::post('/', [CompanyController::class, 'store']); // Register a company
    Route::get('/{id}', [CompanyController::class, 'show']); // Get company details
    Route::put('/{id}', [CompanyController::class, 'update']); // Update company
    Route::delete('/{id}', [CompanyController::class, 'destroy']); // Delete company
});

// PRODUCTS ROUTES
Route::prefix('products')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // List all products
    Route::post('/', [ProductController::class, 'store']); // Create a product
    Route::get('/{id}', [ProductController::class, 'show']); // Get product details
    Route::put('/{id}', [ProductController::class, 'update']); // Update product
    Route::delete('/{id}', [ProductController::class, 'destroy']); // Delete product
});


Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

