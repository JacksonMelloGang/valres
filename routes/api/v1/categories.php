<?php

use App\Http\Controllers\API\SalleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// create route with controller to display a list of salles with json
Route::get('/categories', [CategoryController::class, 'categories'])
    ->name('api.categories.show');

// create route with controller to display a salle info with json.
Route::get('/categories/{id}', [CategoryController::class, 'category'])
    ->name('api.category.show');

