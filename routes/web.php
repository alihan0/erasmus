<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

Route::controller(MainController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index');
});

Route::controller(StaffController::class)->middleware('auth')->prefix('staff')->group(function(){
    Route::get('/', 'all');
    Route::get('/new', 'new');
    Route::post('/create', 'create');
});

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signin');
    Route::get('/logout', 'logout');
});