<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController; //  Dashboard Controller
use App\Http\Controllers\SettingsController; //   Settings Controller

// ========================
//  AUTHENTICATION ROUTES
// ========================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Redirect GET /logout to /login
Route::get('/logout', function () {
    return redirect('/login');
});

// Logout using POST
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ====================================
//  PROTECTED ROUTES (LOGGED-IN USERS ONLY)
// ====================================
Route::middleware('auth')->group(function () {

    //  DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //  GLOBAL SEARCH
    Route::get('/search', [DashboardController::class, 'globalSearch'])->name('search.global');

    //  LEADS CRUD
    Route::resource('leads', LeadController::class);

    //  CONTACTS SEARCH
    Route::get('/contacts/search', [ContactController::class, 'search'])->name('contacts.search');

    //  CONTACTS CRUD
    Route::resource('contacts', ContactController::class);

    //  REPORTS PAGE
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    //  SETTINGS PAGE
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.updateProfile');
    Route::put('/settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');

});
