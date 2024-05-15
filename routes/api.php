<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

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

/* This api routes, here we are not using , as it is making our project big. 
//Incident Management System related Routes. they moved to web.php
Route::get('/incidents',[IncidentController::class,'index']);//REST API
Route::get('/incidents/{id}',[IncidentController::class,'show']);
Route::post('/incidents',[IncidentController::class,'store']);
Route::put('/incidents/{id}',[IncidentController::class,'update']);
Route::delete('/incidents/{id}',[IncidentController::class,'destroy']);
*/
