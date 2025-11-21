<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $designer = \App\Models\Designer::where('user_id', auth()->id())->first();

        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
            'designer'  => $designer
        ]);
    }
}
