<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceDataController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/bookSession', [BookSessionController::class, 'bookSession'])->name('bookSession');
Route::get('/contact', [ContactController::class, 'showContactForm']);
Route::get('/servicesUser', [ServiceDataController::class, 'index']); // Using ServiceDataController for displaying services


// Admin Login Routes
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');  // for handling the login submission
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');  // for handling the logout

Route::resource('services', ServiceController::class);

// Route for Admin Dashboard
Route::get('/admin/dashboard', [ServiceController::class, 'index'])->name('admin.dashboard');

Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
});

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('services', ServiceController::class);
});

