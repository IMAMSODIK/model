<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class AllAccessController extends Controller
{
    public function index()
    {
        $data = [
            'tiket' => Tiket::where('tipe_tiket', 'aa')->get(),
            'pageTitle' => 'All Access',
        ];

        return view('all_access.index', $data);
    }   
}
