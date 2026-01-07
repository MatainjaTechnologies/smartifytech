<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LocalizationController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/register', [PagesController::class, 'register'])->name('register');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.submit');
Route::post('/register/supplier', [ContactController::class, 'registerSupplier'])->name('register.supplier');
Route::post('/register/client', [ContactController::class, 'registerClient'])->name('register.client');

Route::get('lang/{locale}', [LocalizationController::class, 'setLang'])->name('lang.switch');
