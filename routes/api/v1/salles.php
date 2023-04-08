<?php

use App\Http\Controllers\API\SalleController;
use Illuminate\Support\Facades\Route;


// create route with controller to display a list of salles with json
Route::get('/salles', [SalleController::class, 'salles'])
    ->name('api.salles.show');

// create route with controller to display a salle info with json.
Route::get('/salle/{id}', [SalleController::class, 'salle'])
    ->name('api.salle.show');
