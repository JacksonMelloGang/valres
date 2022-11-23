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
});







Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/utilisateur', [AdminUtilisateur::class, 'show']);

    Route::get('/admin/utilisateur/new', [AdminUtilisateur::class, 'create']);

    Route::get('/admin/utilisateur/{id}', [AdminUtilisateur::class, 'show_id']);

    Route::get('/admin/utilisateur/{id}/edit', [AdminUtilisateur::class, 'edit']);

    // path form requests: /admin/utilisateur
    Route::post('/admin/utilisateur/new/submit', [AdminUtilisateurFom::class, 'create']);

    Route::post('/admin/utilisateur/edit', [AdminUtilisateurFom::class, 'update']);

    Route::delete('/admin/utilisateur/delete', [AdminUtilisateurFom::class, 'delete']);
});
