<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;

///Product All Route
Route::controller(ProductController::class)->group(function(){

    Route::get('/all/product','AllProduct')->name('all.product');

    Route::get('/add/product','AddProduct')->name('add.product');

    Route::post('/store/product','StoreProduct')->name('product.store');

    Route::get('/edit/product/{id}','EditProduct')->name('edit.product');

    Route::post('/update/product/{id}','UpdateProduct')->name('update.product');

    Route::get('/delete/product/{id}','DeleteProduct')->name('delete.product');

    Route::get('/barcode/product/{id}','BarcodeProduct')->name('barcode.product');

    Route::get('/import/product','ImportProduct')->name('import.product');

    Route::get('/export/product','Export')->name('export');

    Route::post('/import/product','Import')->name('import');
});
