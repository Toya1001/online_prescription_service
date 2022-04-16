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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data',[dummyapi::class, 'getData']);


 //////////////// USER TABLE /////////////////////
Route::get('list/{id?}', [usersData::class, 'list']);
// Route::get('list/{id}', [usersData::class, 'singleData']);
Route::post('save', [usersData::class, 'store']);
Route::put('update/{id}', [usersData::class, 'update']);
Route::get('user/{word}', [usersData::class, 'search']);
Route::delete('delete/{id}', [usersData::class, 'destroy']);

Route::apiResource('doctor', DoctorController::class);
Route::apiResource('patient', PatientController::class);
Route::apiResource('pharmacist', PharmacistController::class);
Route::apiResource('drug', DrugController::class);
Route::apiResource('inventory', DrugInventoryController::class);
Route::apiResource('history', MedicalHistoryController::class);

