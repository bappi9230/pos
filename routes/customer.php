<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;

Route::controller(CustomerController::class)->group( function(){

    Route::get('/all/customer','AllCustomer')->name('all.customer')->middleware('permission:customer.all');

    Route::get('/add/customer','AddCustomer')->name('add.customer')->middleware('permission:customer.add');

    Route::post('/store/customer','StoreCustomer')->name('customer.store');

    Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer')->middleware('permission:customer.edit');

    Route::post('/update/customer','UpdateCustomer')->name('customer.update');

    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer')->middleware('permission:customer.delete');

});

