<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/country')->middleware(['auth']);




Route::middleware(['auth'])->get('/country', function () {
    return view('country.index');
})->name('home');

Route::resource('country', CountryController::class)->middleware(['auth']);
