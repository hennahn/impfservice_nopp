<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VaccinationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


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

/**
 * UN-GRUPPIERT
 */
// Alle Impfungen
Route::get('vaccinations', [VaccinationController::class, 'getAllVaccinations']);
// Impfung mit id finden
Route::get('vaccinations/{id}',[VaccinationController::class,'getById']);
// alle Locations
Route::get('locations',[LocationController::class, 'getAllLocations']);
// Location mit id finden
Route::get('locations/{id}',[LocationController::class,'getLocationById']);
// alle User*innen
Route::get('users',[UserController::class, 'getAllUsers']);
// User*in mit id finden
Route::get('users/{id}',[UserController::class,'getUserById']);
// Login
Route :: post ( 'auth/login' , [ AuthController :: class , 'login' ]);


/**
 * GRUPPIERT
 * => Alle Routen, die abgesichert werden und nur für authentifizierte (angemeldete) User*innen zugänglich sind
 */

Route::group(['middleware' => ['api', 'auth.jwt']], function(){
    // Impfung hinzufügen
    Route::post('vaccinations', [VaccinationController::class, 'save']);
    // Impfung updaten
    Route::put('vaccinations/{id}', [VaccinationController::class, 'update']);
    // Impfung löschen
    Route::delete('vaccinations/{id}', [VaccinationController::class, 'delete']);
    // Logout
    Route::post('auth/logout', [AuthController::class, 'logout']);
    // Termin buchen
    Route::put('vaccinations/{id}/book', [VaccinationController::class, 'bookVaccination']);
});


