<?php

use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/bidding', function () {
    return view('bidding.index');
});
Route::get('/tech-companies', function () {
    return view('tech_companies.index');
});


Route::get('/profile_page', function() {

    return view('profile.index');

});


Route::get('/about', function() {

    return view('about');
    
});
