<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::controller(PegawaiController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('', 'store')->name('store');
    Route::match(['put', 'patch'], '', 'update')->name('update');
    Route::get('delete/{id}', 'destroy')->name('destroy');

    Route::get('jabatan', 'list_jabatan')->name('list-jabatan');
    Route::get('{id}', 'show')->name('show');
});
