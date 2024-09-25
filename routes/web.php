<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;



Route::get('sendmail', [EmailController::class, 'sendEmail'])->name('sendmail');

Route::get('/', function () {
    return view('welcome');
});

