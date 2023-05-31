<?php

use App\Http\Controllers\APIBatimentController;
use Illuminate\Support\Facades\Route;


// create route with controller to display a list of salles with json
Route::get('/batiments', [APIBatimentController::class, 'batiments'])
    ->name('api.batiment.show');

// create route with controller to display a salle info with json.
Route::get('/batiment/{id}', [APIBatimentController::class, 'batiment'])
    ->name('api.batiment.show');

Route::get('/batiment/{id}/salles', [APIBatimentController::class, 'salles_batiment'])
    ->name('api.batiments.salles.show');