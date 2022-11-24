<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::group(['middleware' => ['check_reservant']], function(){
    Route::get('/reservations', function(){
        return view('reservations');
    })->name('reservations');
});


Route::group(['middleware' => ['admin_auth']], function () {
    Route::get('/admin/user', [AdminUtilisateur::class, 'show']);

    Route::get('/admin/user/new', [AdminUtilisateur::class, 'create']);

    Route::get('/admin/user/{id}', [AdminUtilisateur::class, 'show_id']);

    Route::get('/admin/user/{id}/edit', [AdminUtilisateur::class, 'edit']);

    // path form requests: /admin/user
    Route::post('/admin/user/new/submit', [AdminUtilisateurFom::class, 'create']);

    Route::post('/admin/user/edit', [AdminUtilisateurFom::class, 'update']);

    Route::delete('/admin/user/delete', [AdminUtilisateurFom::class, 'delete']);
});
