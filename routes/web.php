<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
| Routes publiques
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produits', [ProductController::class, 'index'])->name('products.index');
Route::get('/produits/{product}', [ProductController::class, 'show'])->name('products.show');

// Pages encore provisoires : remplacées phase après phase.
Route::view('/a-propos', 'pages.soon', ['title' => 'À propos'])->name('about');
Route::view('/nos-services', 'pages.soon', ['title' => 'Nos services'])->name('services');
Route::view('/conseils', 'pages.soon', ['title' => 'Conseils agricoles'])->name('posts.index');
Route::view('/conseils/{slug}', 'pages.soon', ['title' => 'Article'])->name('posts.show');
Route::view('/contact', 'pages.soon', ['title' => 'Contact'])->name('contact');
Route::view('/faq', 'pages.soon', ['title' => 'FAQ'])->name('faq');
Route::view('/panier', 'pages.soon', ['title' => 'Panier'])->name('cart.index');
Route::view('/conditions-generales', 'pages.soon', ['title' => 'Conditions générales'])->name('terms');
Route::view('/politique-de-confidentialite', 'pages.soon', ['title' => 'Politique de confidentialité'])->name('privacy');

/*
| Authentification (visiteurs non connectés uniquement)
*/
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [RegisterController::class, 'create'])->name('register');
    Route::post('/inscription', [RegisterController::class, 'store'])->middleware('throttle:10,1');

    Route::get('/connexion', [LoginController::class, 'create'])->name('login');
    Route::post('/connexion', [LoginController::class, 'store'])->middleware('throttle:6,1');

    Route::get('/mot-de-passe-oublie', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/mot-de-passe-oublie', [ForgotPasswordController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('password.email');

    Route::get('/reinitialiser-mot-de-passe/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reinitialiser-mot-de-passe', [ResetPasswordController::class, 'store'])->name('password.update');
});

/*
| Espace client (connecté)
*/
Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/mon-compte', [AccountController::class, 'index'])->name('account');
});

/*
| Administration : connecté ET administrateur
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});