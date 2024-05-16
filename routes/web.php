<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

//Inscription
Route::get('/register',[UseAuthController::class,'register'])->name('user-register');
Route::post('/register',[UseAuthController::class,'handleregister'])->name('HandleUserRegister');

//Connexion
Route::get('/login',[UseAuthController::class,'login'])->name('user_login');
Route::post('/login',[UseAuthController::class,'handellogin'])->name('HandleUserLogin');
