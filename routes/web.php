<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScedhuleController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorApplicationController;
use App\Http\Controllers\TodolistController;
use App\Http\Middleware\GuestMiddleware;

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


Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('regis.index');
    Route::post('/buat-akun', [RegisterController::class, 'register'])->name('register');
});



Route::get('/dashboard', [DashboardController::class, 'Dashboard']);

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::post('/task-store', [TodolistController::class, 'store'])->name('task.store');
    Route::post('/task-delete/{id}', [TodolistController::class, 'hapus'])->name('task.hapus');
    
    Route::post('/update-schedule', [ScedhuleController::class, 'update'])->name('schedule.update');
    
    Route::get('/users-activity', [UserActivityController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users-update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/user-delete/{id}', [UserController::class, 'hapus'])->name('users.hapus');

    Route::get('errors-log', [ErrorApplicationController::class, 'index']);
});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
