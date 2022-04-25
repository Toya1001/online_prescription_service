<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugInventoryController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyapi;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\usersData;

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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data',[dummyapi::class, 'getData']);


 //////////////// USER TABLE /////////////////////
Route::get('/user', [usersData::class, 'list']);
Route::get('user/{id}', [usersData::class, 'show']);
Route::post('/user', [usersData::class, 'store']);
Route::put('/user/update/{id}', [usersData::class, 'update']);
Route::get('user/{word}', [usersData::class, 'search']);
Route::delete('/user/delete/{id}', [usersData::class, 'destroy']);

Route::apiResource('doctor', DoctorController::class);
Route::apiResource('patient', PatientController::class);
Route::apiResource('pharmacist', PharmacistController::class);
Route::apiResource('drug', DrugController::class);
Route::apiResource('inventory', DrugInventoryController::class);
Route::apiResource('history', MedicalHistoryController::class);
Route::apiResource('prescription', PrescriptionController::class);

