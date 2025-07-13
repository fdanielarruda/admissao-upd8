<?php

use App\Http\Controllers\Api\CityApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cities-by-uf/{uf}', [CityApiController::class, 'getCitiesByUf']);