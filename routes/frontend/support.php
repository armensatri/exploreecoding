<?php

use App\Http\Controllers\Frontend\Support\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/ec/contact', [ContactController::class, 'index'])
  ->name('ec-contact');
