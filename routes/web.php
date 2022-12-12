<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;

use \App\Http\Controllers\ReservationController;
use \App\Http\Controllers\ReservationControllerForm;

use \App\Http\Controllers\SalleController;
use \App\Http\Controllers\AdminSalleFormController;

use \App\Http\Controllers\AdminUtilisateurController;
use \App\Http\Controllers\AdminUtilisateurFormController;

use App\Http\Controllers\AdminRoleController;
use \App\Http\Controllers\AdminRoleFormController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect('/login');
});

/** Login & Logout Routes **/
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'attempt_login'])->name('attempt_login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// show reservation routes for today. doesn't require to be logged
Route::get('/reservations/today', [ReservationController::class, 'today_reservation'])->name('reservation_today');


/** Routes for all users in the condition they are logged in **/
Route::group(['middleware' => ['auth']], function(){

    // MENU
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');


    /** Reservations **/
    Route::get('/reservation/dashboard', [ReservationController::class, 'index'])->name('reservation_dashboard');

    /** Consult reservations **/
    Route::get('/reservations', [ReservationController::class, 'show_reservations'])->name('reservations');
    Route::get('/reservation/{id}', [ReservationController::class, 'show_reservation'])->name('reservation_show');

    /** Consult salles **/
    Route::get('/salles', [SalleController::class, 'show_salles'])->name('salles');
    Route::get('/salle/{id}', [SalleController::class, 'show_salle'])->name('salle_show');

    // include admin routes
    include __DIR__ . '/admin\routes.php';

    // include reservation routes
    include __DIR__ . '/reservation\routes.php';
});






