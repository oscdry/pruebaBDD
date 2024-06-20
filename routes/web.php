<?php

use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;



Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');



Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::resource('tickets', TicketController::class);
Route::resource('ticket_types', TicketTypeController::class);
Route::resource('admin', AdministratorController::class);
