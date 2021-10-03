<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembershipController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
// Route::resource('users', UserController::class);
// Memaparkan senarai users
Route::get('users/datatables', [UserController::class, 'datatables'])->name('users.datatables');
Route::get('users', [UserController::class, 'index'])->name('users.index');
// Memaparkan borang tambah rekod user
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Menerima data dari borang tambah rekod user dan simpan ke dalam db
Route::post('users/create', [UserController::class, 'store'])->name('users.store');
// Memaparkan detail user
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('users/{user}/memberships', [UserController::class, 'subscribe'])->name('users.memberships.subscribe');
// Memaparkan borang edit detail user
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Menerima data dari borang edit detail user dan update/kemaskini detail dalam db
Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
// Digunakan untuk delete rekod
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Membership routing
Route::resource('memberships', MembershipController::class);


