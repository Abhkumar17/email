<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('mail-send', [SendMailController::class, 'index']);
Route::get('showForm', [SendMailController::class, 'show']);
Route::get('autocomplete', [SendMailController::class,'autocomplete'])->name('autocomplete');
