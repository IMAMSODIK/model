<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllAccessController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'All Access',
        ];

        return view('all_access.index', $data);
    }   
}
