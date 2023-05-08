<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ExpenseController;

Route::controller(ExpenseController::class)->group(function (){

    Route::get('/add/expense','AddExpense')->name('add.expense');

    Route::post('/store/expense','StoreExpense')->name('expense.store');

    Route::get('/daily/expense','DailyExpense')->name('daily.expense');

    Route::get('/edit/expense/{id}','EditExpense')->name('edit.expense');

    Route::post('/update/expense','UpdateExpense')->name('update.expense');

    Route::get('/monthly/expense','MonthlyExpense')->name('monthly.expense');

    Route::get('/yearly/expense','YearlyExpense')->name('yearly.expense');

});
