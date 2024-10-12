<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/welcome', [PublicController::class, 'index'])->name('welcome');
Route::get('/home', [PublicController::class, 'index'])->name('home');
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('about-us');
Route::get('/properties', [PublicController::class, 'properties'])->name('properties');
Route::get('/property-detail/{pid}', [PublicController::class, 'propertyDetail'])->name('property-detail');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/property-search', [PublicController::class, 'propertySearch'])->name('property-search');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/logout',[HomeController::class, 'logout'])->name('logout');
Route::get('/sign-up', [PublicController::class, 'signUp'])->name('signup');
Route::post('/client-signup', [PublicController::class, 'clientRegister'])->name('client-signup');
Route::post('/agent-signup', [PublicController::class, 'agentRegister'])->name('agent-signup');



Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/agents', [AdminController::class, 'agents'])->name('admin-agents');
    Route::get('/clients', [AdminController::class, 'clients'])->name('admin-clients');
    Route::get('/tours',[AdminController::class, 'tours'])->name('admin-tours');
    Route::get('/properties',[AdminController::class, 'properties'])->name('admin-properties');
//    Route::get('/property-detail/{pid}',[AdminController::class, 'propertyDetail'])->name('admin-property-detail');

    Route::put('/approve-property/{pid}',[AdminController::class, 'approveProperty'])->name('admin-approve-property');
    Route::put('/hide-property/{pid}',[AdminController::class, 'hideProperty'])->name('admin-hide-property');

    Route::put('/approve-agent/{uid}',[AdminController::class, 'approveAgent'])->name('admin-approve-agent');
    Route::put('/ban-agent/{uid}',[AdminController::class, 'banAgent'])->name('admin-ban-agent');

    Route::delete('/delete-property/{pid}',[AdminController::class, 'deleteProperty'])->name('admin-delete-property');
    Route::delete('/delete-user/{uid}',[AdminController::class, 'deleteUser'])->name('admin-delete-user');

});



Route::group(['prefix' => 'client', 'middleware' => ['auth','client']], function(){

    Route::get('/dashboard', [ClientController::class, 'clientDashboard'])->name('client-dashboard');
    Route::get('/profile', [ClientController::class, 'profile'])->name('client-profile');
    Route::put('/update-profile',[ClientController::class, 'updateProfile'])->name('client-update-profile');
    Route::get('/schedule-tour-view/{pid}',[ClientController::class, 'tourView']);
    Route::post('/schedule-tour',[ClientController::class, 'scheduleTour'])->name('client-schedule-tour');
    Route::get('/tour-history',[ClientController::class, 'tourHistory'])->name('client-tours');

});


Route::group(['prefix' => 'agent', 'middleware' => ['auth','agent']], function(){

    Route::get('/dashboard', [AgentController::class, 'agentDashboard'])->name('agent-dashboard');
    Route::get('/profile', [AgentController::class, 'profile'])->name('agent-profile');
    Route::put('/update-profile',[AgentController::class, 'updateProfile'])->name('agent-update-profile');
    Route::put('/accept-scheduled-tour/{trid}',[AgentController::class, 'acceptScheduledTour'])->name('agent-accept-scheduled-tour');
    Route::put('/reschedule-tour/{trid}',[AgentController::class, 'rescheduleTour'])->name('agent-reschedule-tour');
    Route::get('/scheduled-tour-history',[AgentController::class, 'scheduledTourHistory'])->name('agent-scheduled-tours');
    Route::get('/properties',[AgentController::class, 'properties'])->name('agent-properties');
    Route::get('/upload-property-view',[AgentController::class, 'uploadPropertyView'])->name('agent-upload-property-view');
    Route::post('/upload-property',[AgentController::class, 'uploadProperty'])->name('agent-upload-property');

});


