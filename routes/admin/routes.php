<?php


/** Admin Routes (Manage Users) - MIDDLEWARE: AUTH & IS ADMIN **/

use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminRoleFormController;
use App\Http\Controllers\AdminStructureController;
use App\Http\Controllers\AdminUtilisateurController;
use App\Http\Controllers\AdminUtilisateurFormController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationControllerForm;
use \App\Http\Controllers\SalleController;
use \App\Http\Controllers\AdminSalleFormController;

Route::middleware(['auth', 'admin.auth'])->group(function(){
    Route::get('/admin', [AdminUtilisateurController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/admin/users', [AdminUtilisateurController::class, 'show_users'])->name('admin.users');

    Route::get('/admin/user/create', [AdminUtilisateurController::class, 'create_user'])->name('admin.user.create');

    Route::get('/admin/user/{id}', [AdminUtilisateurController::class, 'show_user'])->name('admin.user.show');

    Route::get('/admin/user/{id}/edit', [AdminUtilisateurController::class, 'edit_user'])->name('admin.user.edit');


    // Roles
    Route::get('/admin/roles', [AdminRoleController::class, 'show_roles'])->name('admin.roles');

    Route::get('/admin/role/{id}', [AdminRoleController::class, 'show_role_id'])->name('admin.role.show');

    // Salles
    Route::get('/admin/salle/create', [SalleController::class, 'create_salle'])->name('admin.salle.create');

    Route::get('/admin/salle/{id}/edit', [SalleController::class, 'edit_salle'])->name('admin.salle.edit');


    // Structures
    Route::get('/admin/structure/create', [AdminStructureController::class, 'create_structure'])->name('admin.structure.create');

    Route::get('/admin/structure/{id}/edit', [AdminStructureController::class, 'edit_structure'])->name('admin.structure.edit');

    // path form requests: /admin/user
    Route::post('/admin/user/create', [AdminUtilisateurFormController::class, 'create_user']);

    Route::post('/admin/user/edit', [AdminUtilisateurFormController::class, 'update_user']);

    Route::post('/admin/user/delete', [AdminUtilisateurFormController::class, 'delete_user']);

    Route::post('/admin/user/ban', [AdminUtilisateurFormController::class, 'ban_user'])->name('admin.user.ban');

    Route::post('/admin/user/unban', [AdminUtilisateurFormController::class, 'unban_user'])->name('admin.user.unban');

    // path form requests: /admin/salle
    Route::post('/admin/salle/create', [AdminSalleFormController::class, 'create_salle']);

    Route::post('/admin/salle/edit', [AdminSalleFormController::class, 'update_salle']);

    Route::post('/admin/salle/delete', [AdminSalleFormController::class, 'delete_salle']);
});

