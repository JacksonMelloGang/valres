<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\AdminUtilisateurController;
use \App\Http\Controllers\AdminUtilisateurForm;
use \App\Http\Controllers\ReservationController;

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

/** Home for all users **/
Route::get('/dashboard', function () {
    dd(Auth::user()->isAdmin());

    return view('home');
})->name('dashboard')->middleware('auth');



/** Reservations **/
Route::group(['middleware' => ['auth', 'check.canReserve']], function(){
    Route::get('/reservations', function(){
        return view('reservations');
    })->name('reservations');

    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation_create');

    Route::get('/reservation/{id}', [ReservationController::class, 'show_id'])->name('reservation_show');

    Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation_edit');

    Route::get('/reservation/{id}/delete', function($id){
        return view('reservations_delete', ['id' => $id]);
    })->name('reservation_delete');

    Route::get('/reservation/{id}/validate', function($id){
        return view('reservations_validate', ['id' => $id]);
    })->name('reservation_validate');


    /** FORM REQUEST /reservation/  **/

    Route::post('/reservation/create', [ReservationController::class, 'create_form'])->name('reservation_create');

    Route::post('/reservation/{id}/edit', function($id){
        return view('reservations_edit', ['id' => $id]);
    })->name('reservation_edit_post');

    Route::post('/reservation/{id}/delete', function($id){
        return view('reservations_delete', ['id' => $id]);
    })->name('reservation_delete_post');


});


/** Admin Routes (Manage Users) **/
Route::group(['middleware' => ['auth', 'admin.auth']], function () {
    Route::get('/admin/users', [AdminUtilisateur::class, 'show']);

    Route::get('/admin/user/{id}', [AdminUtilisateur::class, 'show_id']);

    Route::get('/admin/user/new', [AdminUtilisateur::class, 'create']);

    Route::get('/admin/user/{id}/edit', [AdminUtilisateur::class, 'edit']);

    // path form requests: /admin/user
    Route::put('/admin/user/new/submit', [AdminUtilisateurFom::class, 'create']);

    Route::post('/admin/user/edit', [AdminUtilisateurFom::class, 'update']);

    Route::delete('/admin/user/delete', [AdminUtilisateurFom::class, 'delete']);
});
