<?php

use App\Http\Controllers\BokingSeatController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SeatController;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(PagesController::class)->group(function () {

    Route::get('/',        'bokings')->name('bokings');
    Route::get('partners', 'partners')->name('partners');
    Route::get('seats',    'seats')->name('seats');
});

Route::resource('partner', PartnerController::class)->except(['show']);
Route::resource('seat',    SeatController::class)->except(['index','show']);

Route::controller(BookingController::class)->group(function () {

    Route::get('bokings/{seat}',       'save')->name('boking.save');
    Route::post('bokings',             'store')->name('boking.store');
    Route::put('bokings/{booking}',    'update')->name('boking.update');
    Route::get('bokings/{booking}/edit',  'edit')->name('boking.edit');
    Route::get('bokings',              'index')->name('boking.index');
    Route::delete('bokings/{booking}', 'destroy')->name('boking.destroy');
    Route::get('bokings/{id}/delete',  'delete')->name('boking.delete');

});

Route::controller(BokingSeatController::class)->group(function () {

    Route::get('bokingseat/{booking_id}/{seat_id}/delete', 'destroy')->name('bokingseat.destroy');
    Route::get('bokingseat/{booking}/{seat}',       'save')->name('bokingseat.save');


});
