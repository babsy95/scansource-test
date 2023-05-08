<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth', 'verified'])->group(function () { 

    Route::get('view', [UserController::class, 'view'])->name('view');
    Route::get('create', [UserController::class, 'createUsers'])->name('createUsers'); 
    Route::post('store', [UserController::class, 'storeUsers'])->name('storeUsers');
    Route::get('users', [UserController::class, 'listAllUsers'])->name('list-users');
    Route::get('edit/{id}', [UserController::class, 'editUsers'])->name('edit-user');
    Route::post('update', [UserController::class, 'updateUser'])->name('update-user'); 
    Route::delete('delete/{id}', [UserController::class, 'userDelete'])->name('update-delete'); 

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/', function () {
    //     return view('auth.login');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    //Route::get('/dashboard', [HomeController::class, 'viewDashboard'])->name('dashboard');

});

Route::get('/', function () {
        return view('auth.login');
    });

require __DIR__.'/auth.php';
