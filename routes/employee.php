<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeeController;

Route::controller(EmployeeController::class)->group( function(){

    Route::get('/all/employee','AllEmployee')->name('all.employee')->middleware('permission:employee.all');

    Route::get('/add/employee','AddEmployee')->name('add.employee')->middleware('permission:employee.add');

    Route::post('/store/employee','StoreEmployee')->name('employee.store');

    Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee')->middleware('permission:employee.edit');

    Route::post('/update/employee','UpdateEmployee')->name('employee.update');

    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee')->middleware('permission:employee.delete');

})->middleware('permission:employee.menu');;

