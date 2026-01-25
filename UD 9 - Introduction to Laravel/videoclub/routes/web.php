<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/catalog', [CatalogController::class, 'getIndex'])->middleware(['auth', 'verified'])->name('catalog.index');

Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->middleware(['auth', 'verified'])->name('catalog.show');

Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->middleware(['auth', 'verified'])->name('catalog.create');

Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->middleware(['auth', 'verified'])->name('catalog.edit');

Route::post('/catalog/create', [CatalogController::class, 'postCreate'])->middleware(['auth', 'verified'])->name('catalog.store');

Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit'])->middleware(['auth', 'verified'])->name('peli.update');

Route::put('/catalog/toggle/{id}', [CatalogController::class, 'toggleRented'])
    ->middleware('auth')
    ->name('catalog.toggle');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
