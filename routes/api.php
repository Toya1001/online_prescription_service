<?php

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