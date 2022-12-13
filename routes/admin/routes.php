<?php


/** Admin Routes (Manage Users) - MIDDLEWARE: AUTH & IS ADMIN **/

use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminRoleFormController;
use App\Http\Controllers\AdminUtilisateurController;
use App\Http\Controllers\AdminUtilisateurFormController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationControllerForm;
use \App\Http\Controllers\SalleController;
use \App\Http\Controllers\AdminSalleFormController;

Route::group(['middleware' => ['admin.auth']], function () {
    Route::get('/admin', [AdminUtilisateurController::class, 'index'])->name('admin_dashboard');

    // Users
    Route::get('/admin/users', [AdminUtilisateurController::class, 'show_users'])->name('admin_users');

    Route::get('/admin/user/create', [AdminUtilisateurController::class, 'create_user'])->name('admin_user_create');

    Route::get('/admin/user/{id}', [AdminUtilisateurController::class, 'show_user'])->name('admin_user_show');

    Route::get('/admin/user/{id}/edit', [AdminUtilisateurController::class, 'edit_user'])->name('admin_user_edit');

    Route::get('/admin/user/{id}/delete', [AdminUtilisateurController::class, 'delete_user'])->name('admin_user_delete');

    // Roles
    Route::get('/admin/roles', [AdminRoleController::class, 'show_roles'])->name('admin_roles');

    Route::get('/admin/role/{id}', [AdminRoleController::class, 'show_role_id'])->name('admin_role_show');

    // Salles
    Route::get('/admin/salles', [SalleController::class, 'show_salles_admin'])->name('admin_salles');

    Route::get('/admin/salle/{id}', [SalleController::class, 'show_salle_admin'])->name('admin_salle_show');

    Route::get('/admin/salle/new', [SalleController::class, 'create_salle'])->name('admin_salle_create');

    Route::get('/admin/salle/{id}/edit', [SalleController::class, 'edit_salle'])->name('admin_salle_edit');

    Route::get('/admin/salle/{id}/delete', [SalleController::class, 'delete_salle'])->name('admin_salle_delete');




    // path form requests: /admin/user
    Route::post('/admin/user/create', [AdminUtilisateurFormController::class, 'create_user']);

    Route::post('/admin/user/edit', [AdminUtilisateurFormController::class, 'update_user']);

    Route::post('/admin/user/delete', [AdminUtilisateurFormController::class, 'delete_user']);


    // path form requests: /admin/role
    Route::post('/admin/role/create', [AdminRoleFormController::class, 'create_role']);

    Route::post('/admin/role/edit', [AdminRoleFormController::class, 'update_role']);

    Route::post('/admin/role/delete', [AdminRoleFormController::class, 'delete_role']);

    // path form requests: /admin/salle
    Route::post('/admin/salle/create', [AdminSalleFormController::class, 'create_salle']);

    Route::post('/admin/salle/edit', [AdminSalleFormController::class, 'update_salle']);

    Route::post('/admin/salle/delete', [AdminSalleFormController::class, 'delete_salle']);
});
