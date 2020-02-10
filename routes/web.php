<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('ticket')->prefix('ticket')->group(function(){
   Route::get('submit', 'TicketController@submitTicket')->name('submit');
   Route::get('list', 'TicketController@listTicket')->name('list');
   Route::post('submit-request', 'TicketController@ticketRequest')->name('submit-request');
});
