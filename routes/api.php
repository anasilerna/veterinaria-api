<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\DuenoController;

Route::apiResource('animales', AnimalController::class);
Route::apiResource('duenos', DuenoController::class);
