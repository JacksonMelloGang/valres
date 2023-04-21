<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\APICategoryController;

// create route with controller to display a list of salles with json
Route::get('/categories', [APICategoryController::class, 'categories'])
    ->name('api.categories.show');

// create route with controller to display a salle info with json.
Route::get('/categories/{id}', [APICategoryController::class, 'category'])
    ->name('api.category.show');

