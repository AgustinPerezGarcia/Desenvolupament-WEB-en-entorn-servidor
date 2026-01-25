<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/catalog', [CatalogController::class, 'getIndex'])->middleware(['auth', 'verified'])->name('catalog');

Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->middleware(['auth', 'verified'])->name('show');

Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->middleware(['auth', 'verified'])->name('create');

Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->middleware(['auth', 'verified'])->name('edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
