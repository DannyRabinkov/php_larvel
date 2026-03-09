<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('country.index');
    });
    Route::resource('country', CountryController::class);
});
