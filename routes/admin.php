<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('logout');

Route::get('/logout', [AdminController::class, 'LogoutPage']);


Route::middleware(['auth'])->group(function (){

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

Route::post('/admin/profile/update', [AdminController::class,'AdminProfileUpdate'])->name('admin.profile.update');

Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');

Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

});


Route::controller(AdminController::class)->group(function (){

    Route::get('/database/backup','DatabaseBackup')->name('database.backup');

    Route::get('/backup/now','BackupNow')->name('backup.now');

    Route::get('{getFilename}','DownloadDatabase');

    Route::get('/delete/database/{getFilename}','DeleteDatabase');
});
