<?php

use App\Http\Controllers\API\APISalleController;
use Illuminate\Support\Facades\Route;


// create route with controller to display a list of salles with json
Route::get('/salles', [APISalleController::class, 'salles'])
    ->name('api.salles.show');

// create route with controller to display a salle info with json.
Route::get('/salle/{id}', [APISalleController::class, 'salle'])
    ->name('api.salle.show');

Route::get('/salles/batiment/{id}', [APISalleController::class, 'salles_batiment'])
    ->name('api.salles.batiment.show');

