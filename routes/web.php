<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\AdminUtilisateur;
use \App\Http\Controllers\AdminUtilisateurForm;

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
    return view('home');
})->name('home')->middleware('auth');



/** Reservations **/
Route::group(['middleware' => ['auth', 'check_reservant']], function(){
    Route::get('/reservations', function(){
        return view('reservations');
    })->name('reservations');
});


/** Admin Routes (Manage Users) **/
Route::group(['middleware' => ['auth', 'admin_auth']], function () {
    Route::get('/admin/users', [AdminUtilisateur::class, 'show']);

    Route::get('/admin/user/{id}', [AdminUtilisateur::class, 'show_id']);

    Route::get('/admin/user/new', [AdminUtilisateur::class, 'create']);

    Route::get('/admin/user/{id}/edit', [AdminUtilisateur::class, 'edit']);

    // path form requests: /admin/user
    Route::put('/admin/user/new/submit', [AdminUtilisateurFom::class, 'create']);

    Route::post('/admin/user/edit', [AdminUtilisateurFom::class, 'update']);

    Route::delete('/admin/user/delete', [AdminUtilisateurFom::class, 'delete']);
});
