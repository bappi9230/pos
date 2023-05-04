<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SalaryController;

Route::controller(SalaryController::class)->group(function(){

    Route::get('/add/advance/salary','AddAdvanceSalary')->name('add.advance.salary');

    Route::post('/advance/salary/store','AdvanceSalaryStore')->name('advance.salary.store');

    Route::get('/all/advance/salary','AllAdvanceSalary')->name('all.advance.salary');

    Route::get('/edit/advance/salary/{id}','EditAdvanceSalary')->name('edit.advance.salary');

    Route::post('/advance/salary/update','AdvanceSalaryUpdate')->name('advance.salary.update');

    Route::get('/advance/salary/delete/{id}','DeleteAdvanceSalary')->name('advance.salary.delete');

    ////////////////pay Salary All route/////////////////////////////

    Route::get('/pay/salary','PaySalary')->name('pay.salary');

    Route::get('/pay/now/salary/{id}','PayNowSalary')->name('pay.now.salary');

    Route::post('/employee/salary/store','EmployeeSalaryStore')->name('employe.salary.store');

    Route::get('/month/salary','MonthSalary')->name('month.salary');

    Route::get('/employee/salary/history/{id}','EmployeeSalaryHistory')->name('employee.salary.history');

});
