<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Support\ContactController;

Route::get('/ec/contact', [ContactController::class, 'index'])
  ->name('ec-contact');
