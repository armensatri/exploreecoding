<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Path\PathController;

Route::get('/path', [PathController::class, 'index'])->name('path');
