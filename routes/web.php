<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\ParadeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VanueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'pageTitle' => 'Welcome',
    ];

    return view('welcome', $data);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    Route::get('/parade', [ParadeController::class, 'index']);
    Route::get('/parade/edit', [ParadeController::class, 'edit']);
    Route::post('/parade/store', [ParadeController::class, 'store']);
    Route::post('/parade/update', [ParadeController::class, 'update']);
    Route::post('/parade/delete', [ParadeController::class, 'delete']);

    Route::get('/designer', [DesignerController::class, 'index']);
    Route::get('/designer/edit', [DesignerController::class, 'edit']);
    Route::post('/designer/store', [DesignerController::class, 'store']);
    Route::post('/designer/update', [DesignerController::class, 'update']);
    Route::post('/designer/delete', [DesignerController::class, 'delete']);

    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('/ticket/edit', [TicketController::class, 'edit']);
    Route::post('/ticket/store', [TicketController::class, 'store']);
    Route::post('/ticket/update', [TicketController::class, 'update']);
    Route::post('/ticket/delete', [TicketController::class, 'delete']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});
