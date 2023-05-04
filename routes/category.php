<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;



///Category All Route
Route::controller(CategoryController::class)->group(function(){

    Route::get('/all/category','AllCategory')->name('all.category');

    Route::post('/store/category','StoreCategory')->name('category.store');

    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');

    Route::post('/update/category','UpdateCategory')->name('category.update');

    Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');

});
