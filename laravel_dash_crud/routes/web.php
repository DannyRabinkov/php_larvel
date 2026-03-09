<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/country');
    Route::resource('country', CountryController::class);
});
