<?php

use App\Http\Controllers\StructureController;
use App\Http\Controllers\UtilisateurFormController;
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

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\UtilisateurControllerForm;
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
Route::get('/reservations/today', [ReservationController::class, 'today_reservation'])->name('reservation.today');


/** Routes for all users in the condition they are logged in **/
Route::group(['middleware' => ['auth']], function(){

    // MENU
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');


    /** Reservations **/
    Route::get('/reservation/dashboard', [ReservationController::class, 'index'])->name('reservation.dashboard');

    /** Consult reservations **/
    Route::get('/reservations', [ReservationController::class, 'show_reservations'])->name('reservations.show');
    Route::get('/reservation/{id}', [ReservationController::class, 'show_reservation'])->name('reservation.show')->where('id', '[0-9]+');
    Route::get('/reservation/create', [ReservationController::class, 'create_reservation'])->name('reservation.create');

    /** Consult salles **/
    Route::get('/salles', [SalleController::class, 'show_salles'])->name('salles.show');
    Route::get('/salle/{id}', [SalleController::class, 'show_salle'])->name('salle.show')->where('id', '[0-9]+');

    /**  Consult structures **/
    Route::get('/structures', [StructureController::class, 'show_structures'])->name('structures.show');
    Route::get('/structure/{id}', [StructureController::class, 'show_structure'])->name('structure.show')->where('id', '[0-9]+');

    // user
    Route::get('/user/profile', [UtilisateurController::class, 'show_profile'])->name('user.profile');
    Route::get('/profile', [UtilisateurFormController::class, 'update_profile'])->name('profile.update');

    // form request reservation
    Route::post('/reservation/create', [ReservationControllerForm::class, 'create'])->name('reservation_create_form');

    // API    Route::post('/get/reservation', [ReservationControllerForm::class, 'get_reservation'])->name('reservation.get');

});

// include admin routes
include __DIR__ . '/web\admin\routes.php';

// include reservation routes (require canReserve permission)
include __DIR__ . '/web\reservation\routes.php';






