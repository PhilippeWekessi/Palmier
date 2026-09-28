<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
| Phase 1 : page de verification d'installation uniquement.
| Les vraies routes (accueil, produits, panier, commandes...) seront
| ajoutees progressivement a partir de la Phase 4.
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Routes admin (squelette)
|--------------------------------------------------------------------------
| Protegees par le middleware 'auth' + 'admin' (voir bootstrap/app.php).
| Contenu ajoute a partir de la Phase 11.
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
});
