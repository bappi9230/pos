<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PosController;

Route::controller(PosController::class)->group(function (){

    Route::get('/pos','Pos')->name('pos');

    Route::post('/add/to/cart','AddToCart')->name('addToCart');

    Route::post('/update/cart/quantity/{rowId}','UpdateQty')->name('update-qty');

    Route::get('/remove-cart-item/{rowId}','RemoveItem')->name('remove-item');

    Route::post('/create-invoice','CreateInvoice');


});
