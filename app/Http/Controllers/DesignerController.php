<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignerRequest;
use App\Http\Requests\UpdateDesignerRequest;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function store(Request $r)
    {
        try {
            $r->validate([
                'nama' => 'required|string',
                'tanggal' => 'required|date',
                'flayer' => 'required|image|max:2048',
            ]);

            // Upload flayer
            $path = $r->file('flayer')->store('flayer', 'public');

            Designer::create([
                'nama' => $r->nama,
                'tanggal' => $r->tanggal,
                'flayer' => $path,
                'user_id' => auth()->id(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
