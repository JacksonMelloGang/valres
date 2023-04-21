<?php

use App\Http\Controllers\API\APICodeController;

Route::get('/code', [APICodeController::class, 'index']);