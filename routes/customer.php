<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;

Route::controller(CustomerController::class)->group( function(){

    Route::get('/all/customer','AllCustomer')->name('all.customer');

    Route::get('/add/customer','AddCustomer')->name('add.customer');

    Route::post('/store/customer','StoreCustomer')->name('customer.store');

    Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer');

    Route::post('/update/customer','UpdateCustomer')->name('customer.update');

    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');

});

