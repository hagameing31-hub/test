<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

Route::get('/', [HomeController::class, 'index']);

// User Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
});

// Employee Check-in Portal
Route::get('/checkin', [\App\Http\Controllers\CheckinController::class, 'index'])->name('checkin');
Route::post('/checkin', [\App\Http\Controllers\CheckinController::class, 'store'])->name('checkin.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/statistic', [\App\Http\Controllers\Admin\DashboardController::class, 'statistic'])->name('statistic');

    Route::resource('services', ServiceController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('employees', \App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('expenses', \App\Http\Controllers\Admin\ExpenseController::class);
    Route::get('attendances', [\App\Http\Controllers\Admin\AttendanceController::class, 'index'])->name('attendances.index');
    
    // Profile is usually a singleton for the user, so we use a custom route
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
