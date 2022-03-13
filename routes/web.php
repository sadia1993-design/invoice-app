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

});
require __DIR__.'/auth.php';
