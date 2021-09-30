<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return '<a href="'. route('contoh') .'">Klik Sini</a>';
    return view('welcome');
});

Route::get('login', [LoginController::class, 'paparBorang'])->name('login');
Route::post('login', [LoginController::class, 'checkLogin'])->name('login.check');

// closure
Route::get('profile/{username?}/{status?}', function ($username = null, $status = 'tiada rekod') {

    if (is_null($username))
    {
        return 'Tiada rekod username dijumpai. Sila cuba lagi!';
    }

    return 'Ini adalah halaman profile bagi akaun: ' . $username . ' status = ' . $status;
});

Route::get('contoh1', function () {

    $senaraiPelajar = [
        ['id' => 1, 'nama' => 'Ahmad', 'email' => 'ahmad@gmail.com'],
        ['id' => 2, 'nama' => 'Ali', 'email' => 'ali@gmail.com'],
        ['id' => 3, 'nama' => 'Siti', 'email' => 'siti@gmail.com'],
    ];

    $pageTitle = config('app.name');

    // Cara 1
    // return view('contoh1')->with('senaraiPelajar', $senaraiPelajar)->with('senaraiPelajar', $senaraiPelajar);
    // Cara 2
    // return view('contoh1', ['senaraiPelajar' => $senaraiPelajar, 'pageTitle' => $pageTitle]);
    // Cara 3
    return view('contoh1', compact('senaraiPelajar', 'pageTitle'));

})->name('contoh');

Route::get('user/{id}', function($id) {
    return $id;
})->where('id', '[a-zA-Z0-9]+');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
], function () {

    Route::get('/dashboard', function () {return null;});
    Route::get('/users', function () {return null;});
    Route::get('/account', function () {return null;});

});


Route::resource('users', UserController::class);


