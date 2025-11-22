<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
        ]);
    }
}
