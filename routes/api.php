<?php

use App\Http\Controllers\Api\ApiAgentController;
use App\Http\Controllers\Api\ApiClientController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::middleware(['auth:api'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::post('/register',[AuthController::class, 'register']);
Route::post('/agent-register',[AuthController::class, 'agentRegister']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/properties', [AuthController::class, 'properties']);
Route::get('/property-detail/{pid}', [AuthController::class, 'propertyDetail']);
Route::get('/property-search', [AuthController::class, 'propertySearch']);

Route::group(['prefix' => 'client', 'middleware' => ['auth:api', 'apiClient']], function() {

    Route::get('/dashboard', [ApiClientController::class, 'clientDashboard']);
    Route::post('/schedule-tour', [ApiClientController::class, 'scheduleTour']);
    Route::get('/tour-history', [ApiClientController::class, 'tourHistory']);

});

Route::group(['prefix' => 'agent', 'middleware' => ['auth:api', 'apiAgent']], function() {

    Route::get('/dashboard', [ApiAgentController::class, 'agentDashboard']);
    Route::post('/accept-scheduled-tour/{trid}', [ApiAgentController::class, 'acceptScheduledTour']);
    Route::post('/reschedule-tour/{trid}', [ApiAgentController::class, 'rescheduleTour']);
    Route::get('/scheduled-tours', [ApiAgentController::class, 'scheduledTourHistory']);
    Route::get('/properties', [ApiAgentController::class, 'properties']);
    Route::post('/upload-property', [ApiAgentController::class, 'uploadProperty']);

});


