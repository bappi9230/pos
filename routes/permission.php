<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\AdminController;

Route::controller(RoleController::class)->group(function (){

    Route::get('/all/permission','AllPermission')->name('all.permission');

    Route::get('/add/permission','AddPermission')->name('add.permission');

    Route::post('/store/permission','StorePermission')->name('permission.store');

    Route::get('/edit/permission/{id}','EditPermission')->name('permission.edit');

    Route::post('/edit/permission','UpdatePermission')->name('permission.update');

    Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');


    ////////////////////roles /////////////////////////

    Route::get('/all/roles','AllRoles')->name('all.roles');

    Route::get('/add/roles','AddRoles')->name('add.roles');

    Route::post('/store/roles','StoreRoles')->name('roles.store');

    Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');

    Route::post('/update/roles','UpdateRoles')->name('roles.update');

    Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');




    ////////////////////Add Roles in Permission All Route//////////////////////////////////

        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');

        Route::post('/roles/permission/store','RolePermissionStore')->name('role.permission.store');

        Route::get('/all/roles/permission','AllRolePermission')->name('all.roles.permission');

        Route::get('/admin/edit/roles/permission/{id}','EditRolePermission')->name('admin.edit.role.permission');

        Route::post('/update/roles/permission/{id}','UpdateRolePermission')->name('update.role.permission');

        Route::get('/edit/roles/permission/{id}','DeleteRolePermission')->name('delete.role.permission');

});


Route::controller(AdminController::class)->group(function (){

    Route::get('/all/admin','AllAdminUser')->name('all.admin.user');

    Route::get('/add/admin','AddAdmin')->name('add.admin');
});
