<?php

use App\Http\Controllers\API\SalleController;
use App\Http\Controllers\APITokenController;
use Illuminate\Support\Facades\Route;

// create route with controller to display a list of salles with json
Route::post('/token', [APITokenController::class, 'token'])
    ->name('api.token')
    ->withoutMiddleware(['api.tokencheck']);
