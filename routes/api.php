<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// alle Impfungen
Route::get('vaccinations', [\App\Http\Controllers\VaccinationController::class, 'getAllVaccinations']);

// alle impfungen pro location
Route::get('vaccinations/location/{location_id}', [\App\Http\Controllers\VaccinationController::class, 'getByLocation']);

// Impfung hinzufügen
Route::post('vaccinations', [\App\Http\Controllers\VaccinationController::class, 'save']);

// Impfung updaten
Route::put('vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'update']);

// Impfung löschen
Route::delete('vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'delete']);
