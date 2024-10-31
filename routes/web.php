<?php

use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [ResourceController::class, 'index']);
