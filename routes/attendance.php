<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AttendenceController;

Route::controller(AttendenceController::class)->group(function(){

    Route::get('/employee/attend/list','EmployeeAttendenceList')->name('employee.attend.list');

    Route::get('/add/employee/attend','AddEmployeeAttendence')->name('add.employee.attend');

    Route::post('/employee/attend/store','EmployeeAttendStore')->name('employee.attend.store');

    Route::get('/employee/attend/Edit/{date}','EmployeeAttendEdit')->name('employee.attend.edit');

    Route::get('/employee/attend/view/{date}','EmployeeAttendView')->name('employee.attend.view');

    Route::post('/employee/attend/update','EmployeeAttendUpdate')->name('employee.attend.update');

    Route::get('/employee/attend/delete/{date}','EmployeeAttendDelete')->name('employee.attend.delete');

})->middleware('permission:attendence.menu');
