<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
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

Route::get('/users',  [UserController::class, 'index'])->name('users');
Route::get('/users/create',  [UserController::class, 'create'])->name('users.create');

// Route::resources('users', [UserController::class]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/devices', DeviceController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
