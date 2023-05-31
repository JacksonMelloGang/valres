<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => ['api.tokencheck']], function () {
    include __DIR__ . '/api\v1\token.php';
    include __DIR__ . '/api\v1\code.php';


    include __DIR__ . '/api\v1\roles.php';
    include __DIR__ . '/api\v1\batiments.php';
    include __DIR__ . '/api\v1\structures.php';
    include __DIR__ . '/api\v1\reservations.php';
    include __DIR__ . '/api\v1\salles.php';
    include __DIR__ . '/api\v1\categories.php';

});

