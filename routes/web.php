<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\LiveSearchController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('mail-send', [SendMailController::class, 'index']);
Route::get('showForm', [SendMailController::class, 'show']);
Route::get('autocomplete', [SendMailController::class,'autocomplete'])->name('autocomplete');

Route::post('/emailsend', [SendMailController::class,'emailsend'])->name('emailsend');

Route::get('/livesearch', [LiveSearchController::class, 'index_1']);
Route::get('/action', [LiveSearchController::class, 'action'])->name('action');