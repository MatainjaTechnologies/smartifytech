<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
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
Route::get('/terms', [PagesController::class, 'terms'])->name('terms');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.submit');
Route::post('/register/supplier', [ContactController::class, 'registerSupplier'])->name('register.supplier');
Route::post('/register/client', [ContactController::class, 'registerClient'])->name('register.client');

// Real-time validation routes
Route::post('/validate/email', [RegistrationController::class, 'validateEmail'])->name('validate.email');
Route::post('/validate/company-reg-no', [RegistrationController::class, 'validateCompanyRegNo'])->name('validate.company-reg-no');

Route::get('lang/{locale}', [LocalizationController::class, 'setLang'])->name('lang.switch');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/upload', [AdminController::class, 'upload'])->name('admin.upload');
});

Route::get('/storage/pricelists/{filename}', [AdminController::class, 'showPriceList'])->name('admin.pricelist.show');

// Test email route
Route::get('/test-email', [PagesController::class, 'testEmail'])->name('test.email');

Auth::routes(['register' => false]);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('guest');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
