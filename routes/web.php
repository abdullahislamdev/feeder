<?php

use App\Http\Controllers\FeederController;
use App\Http\Controllers\OfficeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Add Ofice
Route::post('/create-office',[OfficeController::class,'createOffice']);
Route::get('/office-page',[OfficeController::class,'officePage']);
Route::get('/office-list',[OfficeController::class,'officeList']);

//Add Feeder
Route::post('/create-feeder',[FeederController::class,'createFeeder']);
Route::get('/get-feeder',[FeederController::class,'feederList']);
Route::get('/all-feeder',[FeederController::class,'allFeeder']);
