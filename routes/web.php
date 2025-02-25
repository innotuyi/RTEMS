<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminBidController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TechController;

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
// Route::prefix('users')->group(function () {
//     Route::get('/', [UserController::class, 'index']); // List all users
//     Route::post('/', [UserController::class, 'store']); // Create a new user
//     Route::get('/{id}', [UserController::class, 'show']); // Get user details
//     Route::put('/{id}', [UserController::class, 'update']); // Update user
//     Route::delete('/{id}', [UserController::class, 'destroy']); // Delete user
   
// });

Route::get('/login', [AuthController::class, 'login'])->name('login'); // Delete user
Route::get('/register', [AuthController::class, 'register'])->name('register'); // Delete user

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

Route::get('/bidding', [BidController::class, 'index'])->name('bidding.index');


Route::get('/profile_page', [CompanyController::class, 'profilePage'])->name('profile.index');

Route::get('/tech-companies', [TechController::class, 'index'])->name('tech-companies.index');


Route::get('/reports/bids', [ReportController::class, 'generateBidsReport'])->name('reports.bids');
Route::get('/reports/bid-applications', [ReportController::class, 'generateBidApplicationsReport'])->name('reports.bid_applications');
Route::get('/reports/regulatory-approvals', [ReportController::class, 'generateRegulatoryApprovalsReport'])->name('reports.regulatory_approvals');
Route::get('/reports/notifications', [ReportController::class, 'generateNotificationsReport'])->name('reports.notifications');



Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');



Route::get('/admin/bids', [AdminBidController::class, 'index'])->name('admin.bids.index');
Route::get('/admin/bids/{id}', [AdminBidController::class, 'show'])->name('admin.bids.show');
Route::get('/admin/bids/create', [AdminBidController::class, 'create'])->name('admin.bids.create');
Route::post('/admin/bids', [AdminBidController::class, 'store'])->name('admin.bids.store');
Route::get('/admin/bids/edit/{id}', [AdminBidController::class, 'edit'])->name('admin.bids.edit');
Route::put('/admin/bids/{user}', [AdminBidController::class, 'update'])->name('admin.bids.update');
Route::delete('/admin/bids/{id}', [AdminBidController::class, 'destroy'])->name('admin.bids.destroy');
Route::get('/bids/create', [AdminBidController::class, 'create'])->name('users.create');




Route::get('/admin/companies', [AdminCompanyController::class, 'index'])->name('admin.companies.index');
Route::get('/admin/companies/{id}', [AdminCompanyController::class, 'show'])->name('admin.companies.show');
Route::get('/admin/create/create', [AdminCompanyController::class, 'create'])->name('admin.companies.create');
Route::post('/admin/companies', [AdminCompanyController::class, 'store'])->name('admin.companies.store');
Route::get('/admin/companies/edit/{id}', [AdminCompanyController::class, 'edit'])->name('admin.companies.edit');
Route::put('/admin/companies/{user}', [AdminCompanyController::class, 'update'])->name('admin.companies.update');
Route::delete('/admin/companies/{id}', [AdminCompanyController::class, 'destroy'])->name('admin.companies.destroy');


