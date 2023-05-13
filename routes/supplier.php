<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SupplierController;

Route::controller(SupplierController::class)->group( function(){

    Route::get('/all/supplier','AllSupplier')->name('all.supplier')->middleware('permission:supplier.all');

    Route::get('/add/supplier','AddSupplier')->name('add.supplier')->middleware('permission:supplier.add');

    Route::post('/store/supplier','StoreSupplier')->name('supplier.store');

    Route::get('/edit/supplier/{id}','EditSupplier')->name('edit.supplier')->middleware('permission:supplier.edit');

    Route::post('/update/supplier','UpdateSupplier')->name('supplier.update');

    Route::get('/delete/supplier/{id}','DeleteSupplier')->name('delete.supplier')->middleware('permission:supplier.delete');

})->middleware('permission:supplier.menu');
