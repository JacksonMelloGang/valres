<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationControllerForm;

/** Reservations - MIDDLEWARE: AUTH & CAN RESERVE **/
Route::group(['middleware' => ['auth', 'check.canReserve']], function(){

    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation_create');

    /** FORM REQUEST /reservation/{create|edit|delete}  **/
    Route::post('/reservation/create', [ReservationControllerForm::class, 'create'])->name('reservation_create_form');

    Route::post('/reservation/{id}/edit', [ReservationControllerForm::class, 'edit'])->name('reservation_edit_form');

    Route::post('/reservation/{id}/delete', [ReservationControllerForm::class, 'delete'])->name('reservation_delete_form');
});