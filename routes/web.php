<?php

use Illuminate\Support\Facades\Route;



//frontEnd
Route::get('/', function () {
    return view('welcome');
});


//backend
Route::prefix('dashboard')->middleware(['auth'])->group( function (){

    Route::get('/', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('clients', \App\Http\Controllers\ClientController::class)
        ->except(["show"]);
    Route::get('clients/lists', [\App\Http\Controllers\ClientController::class, 'lists'])->name('lists');

});
require __DIR__.'/auth.php';
