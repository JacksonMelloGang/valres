<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationControllerForm;

/** Reservations - MIDDLEWARE: AUTH & CAN RESERVE **/
Route::group(['middleware' => ['auth', 'check.canReserve']], function(){


    Route::get('/reservation/manage', [ReservationController::class, 'manage_reservation'])->name('reservation.manage');

    Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');

    Route::get('/reservation/{id}/delete', [ReservationController::class, 'delete'])->name('reservation.delete');



    /** FORM REQUEST /reservation/{create|edit|delete}  **/

    Route::post('/reservation/edit', [ReservationControllerForm::class, 'edit'])->name('reservation_edit_form');

    Route::post('/reservation/delete', [ReservationControllerForm::class, 'delete'])->name('reservation_delete_form');
});
