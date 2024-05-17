<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseAuthController;
use App\Http\Controllers\VendorAuthController;
use App\Http\Controllers\VendorsDashboardController;
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
Route::get('/home', function () {
    return view('welcome');
});

//On n'aura pas acces au lien d'inscription de connexion et de deconnexion grace à middleware('guest)
Route::middleware('guest')->group(function () {
    //Inscription
    Route::get('/register', [UseAuthController::class, 'register'])->name('user-register');
    Route::post('/register', [UseAuthController::class, 'handleregister'])->name('HandleUserRegister');

    //Connexion
    Route::get('/login', [UseAuthController::class, 'login'])->name('user_login');
    Route::post('/login', [UseAuthController::class, 'handlelogin'])->name('HandleUserLogin');
});

//Déconnexion
Route::get('/logout', [UseAuthController::class, 'handlelogout'])->name('Logout');

//Route pour l'ensemble des vendeurs
Route::prefix('vendors/account')->group(function () {
    //Routes d'inscription des vendeurs
    Route::get('login', [VendorAuthController::class, 'login'])->name('VendorsLogin');
    Route::post('login', [VendorAuthController::class, 'vendorhandlelogin'])->name('HandleVendorsLogin');
    //Routes de connexion des vendeurs
    Route::get('register', [VendorAuthController::class, 'register'])->name('VendorsRegister');
    Route::post('register', [VendorAuthController::class, 'vendorhandleregister'])->name('HandleVendorsRegister');
});
//Ensemble des routes ou l'on doit se connecter avant d'avoir acces.
Route::middleware('vendor_middleware')->prefix('vendors/dashboard')->group(function () {
    Route::get('/', [VendorsDashboardController::class, 'index'])->name('VendorsDashboard');
    Route::get('/logout', [VendorsDashboardController::class, 'logout'])->name('VendorsLogout');
});
