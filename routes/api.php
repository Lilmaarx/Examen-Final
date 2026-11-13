<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

// Rutas CRUD para el recurso vehiculos
Route::apiResource('vehiculos', VehiculoController::class);