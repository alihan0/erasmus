<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
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
    Route::post('/upload', 'upload');
});

Route::controller(StaffController::class)->middleware('auth')->prefix('staff')->group(function(){
    Route::get('/', 'all');
    Route::get('/new', 'new');
    Route::get('/edit/{id}', 'edit');
    Route::post('/create', 'create');
    Route::post('/update', 'update');
    Route::post('/change-password', 'change_password');
    Route::post('/remove', 'remove');
});

Route::controller(UserController::class)->middleware('auth')->prefix('user')->group(function(){
    Route::get('/', 'all');
    Route::get('/new', 'new');
    Route::get('/edit/{id}', 'edit');
    Route::get('/detail/{id}', 'detail');
    Route::post('/create', 'create');
    Route::post('/update', 'update');
    Route::post('/remove', 'remove');
    Route::post('/change-password', 'change_password');
    Route::post('/save-logo', 'save_logo');
});

Route::controller(ParticipantController::class)->middleware('auth')->prefix('participant')->group(function(){
    Route::get('/', 'all');
    Route::get('/new', 'new');
    Route::get('/edit/{id}', 'edit');
    Route::get('/detail/{id}', 'detail');
    Route::post('/create', 'create');
    Route::post('/update', 'update');
    Route::post('/remove', 'remove');
    Route::post('/save-image', 'save_image');
    Route::post('/add/emergency-contact', 'add_emergency_contact');
});

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signin');
    Route::get('/logout', 'logout');
});