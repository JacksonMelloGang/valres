<?php

use App\Http\Controllers\API\SalleController;
use Illuminate\Support\Facades\Route;


// create route with controller to display a list of salles with json
Route::get('/v1/salles', [SalleController::class, 'salles'])
    ->name('api.salles');

// create route with controller to display a salle info with json.
Route::get('/v1/salle/{id}', [SalleController::class, 'salle'])
    ->name('api.salle');
