<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Authentication\LoginController;


Route::get('/', function () {
    // return '<a href="'. route('contoh') .'">Klik Sini</a>';
    return view('welcome');
});

Route::get('login', [LoginController::class, 'paparBorang'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.check');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Route::resource('users', UserController::class);
    // Memaparkan senarai users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    // Memaparkan borang tambah rekod user
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    // Menerima data dari borang tambah rekod user dan simpan ke dalam db
    Route::post('users/create', [UserController::class, 'store'])->name('users.store');
    // Memaparkan detail user
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    // Memaparkan borang edit detail user
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Menerima data dari borang edit detail user dan update/kemaskini detail dalam db
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    // Digunakan untuk delete rekod
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Membership routing
    Route::resource('memberships', MembershipController::class);

});



