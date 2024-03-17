<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingsController;



//homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register routes (only for users)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class,'register']);





// Routes for users only 
Route::middleware(['UserAuth'])->group(function () {

    route::get('/user', [UserController::class, 'user'])->name('user');

    //booking 
    Route::get('/bookings/create', [BookingsController::class, 'create'])->name('bookings.create');
    Route::get('/bookings/confirmation/{id}', [BookingsController::class, 'confirmation'])->name('bookings.confirmation');

});



// Protected routes for admin
Route::middleware(['AdminAuth'])->group(function () {
    route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    // Routes for airport management
    Route::get('/airports', [AirportController::class, 'index'])->name('airports.a_index');
    Route::get('/airports/a_create', [AirportController::class, 'create'])->name('airports.a_create');
    Route::POST('/airports', [AirportController::class, 'store'])->name('airports.store');
    Route::get('/airports/{airport}/a_edit', [AirportController::class, 'edit'])->name('airports.edit');
    Route::put('/airports/{airport}',  [AirportController::class, 'update'])->name('airports.update');
    Route::delete('/airports/{airport}',[AirportController::class, 'destroy'])->name('airports.destroy');
    Route::get('/airports/search', [AirportController::class, 'search'])->name('airports.search');
    
    
    // Routes for flight management
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.f_index');
    Route::get('/flights/f_create', [FlightController::class, 'create'])->name('flights.create');
    Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
    Route::get('/flights/{flight}/f_edit', [FlightController::class, 'edit'])->name('flights.edit');
    Route::put('/flights/{flight}',  [FlightController::class, 'update'])->name('flights.update');
    Route::delete('/flights/{flight}',[FlightController::class, 'destroy'])->name('flights.destroy');


    //bookings 
    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings.index');


    // Routes for user management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}',  [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


});


//both user and admin can access this. but have to be logged in

Route::middleware(['BothCanAccess'])->group(function () {

    // Search flights
    Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');
    Route::get('/flights/search-result', [FlightController::class, 'search'])->name('flights.search-result');
    
    
   //booking
    Route::post('/bookings/store', [BookingsController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingsController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{id}', [BookingsController::class, 'destroy'])->name('bookings.destroy');

});







