<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authorize;

Route::view('/', 'home');
Route::view('/contact', 'contact');


Route::resource('jobs', JobController::class);



