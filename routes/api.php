<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VaccinationController;
use App\Http\Controllers\LocationController;


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

// Alle Impfungen
Route::get('vaccinations', [VaccinationController::class, 'getAllVaccinations']);

// Alle impfungen pro Location
Route::get('vaccinations/location/{location_id}', [VaccinationController::class, 'getByLocation']);

// Impfung mit id finden
Route::get('vaccinations/{id}',[VaccinationController::class,'getById']);

// Impfung hinzufügen
Route::post('vaccinations', [VaccinationController::class, 'save']);

// Impfung updaten
Route::put('vaccinations/{id}', [VaccinationController::class, 'update']);

// Impfung löschen
Route::delete('vaccinations/{id}', [VaccinationController::class, 'delete']);

// alle Locations
Route::get('locations',[LocationController::class, 'getAllLocations']);

// Location mit id finden
Route::get('locations/{id}',[LocationController::class,'getLocationById']);
