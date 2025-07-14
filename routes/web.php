<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepresentativeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clientes', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clientes/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clientes', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clientes/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clientes/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clientes/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/representantes', [RepresentativeController::class, 'index'])->name('representatives.index');
    Route::get('/representantes/create', [RepresentativeController::class, 'create'])->name('representatives.create');
    Route::post('/representantes', [RepresentativeController::class, 'store'])->name('representatives.store');
    Route::get('/representantes/{id}', [RepresentativeController::class, 'edit'])->name('representatives.edit');
    Route::put('/representantes/{id}', [RepresentativeController::class, 'update'])->name('representatives.update');
    Route::delete('/representantes/{id}', [RepresentativeController::class, 'destroy'])->name('representatives.destroy');

    Route::get('/representantes/{id}/cidades', [RepresentativeController::class, 'editCities'])->name('representatives.cities.edit');
    Route::put('/representantes/{id}/cidades', [RepresentativeController::class, 'addCity'])->name('representatives.cities.update');
    Route::delete('/representantes/{id}/cidades/{city_id}', [RepresentativeController::class, 'detachCity'])->name('representatives.cities.detach');
});

require __DIR__ . '/auth.php';
