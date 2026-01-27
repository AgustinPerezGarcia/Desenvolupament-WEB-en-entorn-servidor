<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalogo', [CatalogoController::class, 'getIndex'])->middleware(['auth', 'verified'])->name('catalogo.index');
Route::get('/catalogo/show/{id}', [CatalogoController::class, 'getShow'])->middleware(['auth', 'verified'])->name('catalogo.show');
Route::get('/catalogo/edit/{id}', [CatalogoController::class, 'getEdit'])->middleware(['auth', 'verified'])->name('catalogo.edit');
Route::get('/catalogo/create', [CatalogoController::class, 'getCreate'])->middleware(['auth', 'admin', 'verified'])->name('catalogo.create');

Route::post('/catalogo/create', [CatalogoController::class, 'postCreate'])->name('pelicula.store');
Route::put('/catalogo/edit/{id}', [CatalogoController::class, 'putUpdate'])->name('update.pelicula');

Route::put('/catalog/toggle/{id}', [CatalogoController::class, 'toggleRented'])
    ->middleware('auth')
    ->name('catalog.toggle');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
