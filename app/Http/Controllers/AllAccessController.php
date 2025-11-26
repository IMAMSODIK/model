<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AllAccessTicket;
use App\Models\Tiket;
use Illuminate\Http\Request;

class AllAccessController extends Controller
{
    public function index()
    {
        $data = [
            'tiket' => Tiket::with('designer.parade')->where('tipe_tiket', 'aa')->get(),
            'pageTitle' => 'All Access',
        ];

        return view('all_access.index', $data);
    }   

    public function detail(Request $r){
        $tiket = Tiket::where('id', $r->id)->first();

        if($tiket){
            $allAccess = AllAccessTicket::with('designer.parade')->where('kode_tiket', $tiket->kode_tiket)->get();

            return response()->json([
                'status' => true,
                'data' => $allAccess
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        
    }
}
