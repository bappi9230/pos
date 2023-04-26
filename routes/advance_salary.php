<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SalaryController;

Route::controller(SalaryController::class)->group(function(){

    Route::get('/add/advance/salary','AddAdvanceSalary')->name('add.advance.salary');

});
