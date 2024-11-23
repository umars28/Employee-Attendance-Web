<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::post('/profile/edit', 'update')->name('profile.update');
});

Route::controller(EmployeeController::class)->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/employees', 'index')->name('employees.index');
    Route::get('/employees/create', 'create')->name('employees.create');
    Route::post('/employees', 'store')->name('employees.store'); 
    Route::get('/employees/{employee}/edit', 'edit')->name('employees.edit'); 
    Route::put('/employees/{employee}', 'update')->name('employees.update');
});

Route::controller(AttendanceController::class)->middleware('auth')->group(function () {
    Route::get('/attendance', 'index')->name('attendance.index');
    Route::post('/attendance', 'store')->name('attendance.store');
});



