<?php

use Illuminate\Support\Facades\Route;


//frontEnd
Route::get('/', function () {
    return view('welcome');
});


//backend
Route::prefix('dashboard')->middleware(['auth'])->group( function (){

    Route::get('/', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::get('/client/fetch', [\App\Http\Controllers\ClientController::class, 'fetch'])->name('clientFetch');

});
require __DIR__.'/auth.php';
