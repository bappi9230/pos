<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeeController;

Route::controller(EmployeeController::class)->group( function(){

    Route::get('/all/employee','AllEmployee')->name('all.employee');

    Route::get('/add/employee','AddEmployee')->name('add.employee');

    Route::post('/store/employee','StoreEmployee')->name('employee.store');

    Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');

    Route::post('/update/employee','UpdateEmployee')->name('employee.update');

    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');

});

