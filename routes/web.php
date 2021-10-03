<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserMembershipController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\ForgotPasswordController;


Route::redirect('/', 'login');

Route::get('login', [LoginController::class, 'paparBorang'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.check');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetLink'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.update');

Route::group([
    'middleware' => ['auth'],
], function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('memberships', [UserMembershipController::class, 'index'])->name('user.memberships.index');
    Route::get('memberships/create', [UserMembershipController::class, 'create'])->name('user.memberships.create');
    Route::post('memberships/create', [UserMembershipController::class, 'store'])->name('user.memberships.store');
    Route::get('notifications/{id}', [NotificationController::class, 'update'])->name('notifications.update');
});
