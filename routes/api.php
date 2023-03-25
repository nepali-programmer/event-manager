<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TicketTypeApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\EventApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware'=>['auth:sanctum']],function() {
    Route::get('/ticket-type',[TicketTypeApiController::class, 'list']);
    Route::get('/event',[EventApiController::class, 'list']);    
});

Route::post('/token', [LoginApiController::class, 'token']);