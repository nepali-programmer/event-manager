<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketTypeController;

Route::get('/', [EventController::class, 'index'])->name('event');
Route::post('/', [EventController::class, 'create']);
Route::delete('/', [EventController::class, 'destroy']);

Route::get('/event/{id}', [EventController::class, 'detail']);
Route::get('/event/{id}/update', [EventController::class, 'update_index']);
Route::post('/event/{id}/update', [EventController::class, 'update']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function() {
    return redirect('/')->with(Auth::logout());
});

Route::get('/ticket-type', [TicketTypeController::class, 'index'])->name('ticket-type');
Route::post('/ticket-type', [TicketTypeController::class, 'create']);
Route::delete('/ticket-type', [TicketTypeController::class, 'destroy']);
Route::patch('/ticket-type', [TicketTypeController::class, 'update']);