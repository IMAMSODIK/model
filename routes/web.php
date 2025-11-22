<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\ParadeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VanueController;
use App\Models\Designer;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'pageTitle' => 'Welcome',
    ];

    return view('welcome', $data);
});

Route::get('/designer/ticket-verification', [DesignerController::class, 'verifikasi']);
Route::post('/designer/ticket-verification', [DesignerController::class, 'verifikasiProses']);

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
    Route::get('/designer/ticket', [DesignerController::class, 'ticket']);
    Route::post('/designer/generate-ticket', [DesignerController::class, 'generateTicket']);
    Route::post('/designer/generate-ticket/delete', [DesignerController::class, 'generateTicketDelete']);
    Route::post('/designer/generate-ticket/clear', [DesignerController::class, 'generateTicketClear']);
    Route::get('/designer/generate-ticket/download/{designer_id}', [DesignerController::class, 'generateTicketDownload']);

    Route::get('/monitor-tiket', function(Request $r) {
        $data = [
            'designer' => Designer::where('id', $r->id)->first()
        ];
        return view('monitor-tiket', $data);
    });

    Route::get('/api/monitor-tiket', function(Request $r) {
        return Tiket::with('designer')->where('designer_id', $r->id)->get();
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});
