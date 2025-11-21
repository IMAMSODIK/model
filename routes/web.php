<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignerController;
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

    Route::post('/designer-store', [DesignerController::class, 'store']);

    Route::get('/vanue', [VanueController::class, 'index']);
    Route::get('/vanue/edit', [VanueController::class, 'edit']);
    Route::post('/vanue/store', [VanueController::class, 'store']);
    Route::post('/vanue/update', [VanueController::class, 'update']);
    Route::post('/vanue/delete', [VanueController::class, 'delete']);

    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('/ticket/edit', [TicketController::class, 'edit']);
    Route::post('/ticket/store', [TicketController::class, 'store']);
    Route::post('/ticket/update', [TicketController::class, 'update']);
    Route::post('/ticket/delete', [TicketController::class, 'delete']);

    // Route::get('/dokumentasi-raker', [DokumentasiController::class, 'index']);
    // Route::post('/dokumentasi-raker/store', [DokumentasiController::class, 'store']);
    // Route::post('/dokumentasi-raker/delete', [DokumentasiController::class, 'delete']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});
