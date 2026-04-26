<?php

use App\Http\Controllers\Api\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/destinations', [DestinationController::class, 'index']);
Route::get('/destinations/{slug}', [DestinationController::class, 'show']);
