<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\OrderController;

Route::controller(OrderController::class)->group(function (){

    Route::post('/final-invoice','FinalInvoice');

    Route::get('/pending/order','PendingOrder')->name('pending.order');

    Route::get('/order/details/{id}','OrderDetails')->name('order.details');

    Route::post('/order/status','OrderStatus')->name('order.status');

    Route::get('/complete/status','CompleteOrder')->name('complete.product');

    Route::get('/stock','StockManage')->name('stock.manage');

    Route::get('/pdf/invoice/{id}','PdfInvoice')->name('pdf.invoice');



});
