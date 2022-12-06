<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BlogController;



Route::get('/blogs', [BlogController::class, 'getArticles']);

Route::get('/', function () {
    return view('employee');
});
Route::post('employee-add', [EmployeeController::class, 'employee_add']);
Route::get('employee-view', [EmployeeController::class, 'employee_view']);
Route::get('employee-delete', [EmployeeController::class, 'employee_delete']);
Route::post('employee-edit', [EmployeeController::class, 'employee_edit']);
Route::get('employee-list', [EmployeeController::class, 'employee_list']);
Route::post('/sendBacancyMail',[MailController::class,'sendMail'])->name('send.email');

Route::get('mail-send', [SendMailController::class, 'index']);
Route::get('showForm', [SendMailController::class, 'show']);
Route::get('autocomplete', [SendMailController::class,'autocomplete'])->name('autocomplete');

Route::post('/emailsend', [SendMailController::class,'emailsend'])->name('emailsend');

Route::get('/livesearch', [LiveSearchController::class, 'index_1']);
Route::get('/action', [LiveSearchController::class, 'action'])->name('action');

Route::resource('todo', TodoController::class);