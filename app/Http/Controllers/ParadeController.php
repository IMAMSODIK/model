<?php

namespace App\Http\Controllers;

use App\Models\Parade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParadeRequest;
use App\Http\Requests\UpdateParadeRequest;
use Illuminate\Http\Request;

class ParadeController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Parade',
            'data' => Parade::all()
        ];

        return view('parade.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'vanue' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload gambar
        $filename = time() . '-' . $request->gambar->getClientOriginalName();
        $request->gambar->move(public_path('storage/parade'), $filename);

        Parade::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'vanue' => $request->vanue,
            'gambar' => $filename,
        ]);

        return response()->json(['message' => 'Parade berhasil ditambahkan']);
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        try {
            $parade = Parade::findOrFail($id);
            return response()->json($parade);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'vanue' => 'required',
        ]);

        $parade = Parade::findOrFail($request->id);

        // jika upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($parade->gambar && file_exists(public_path('storage/parade/' . $parade->gambar))) {
                unlink(public_path('storage/parade/' . $parade->gambar));
            }

            $filename = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('storage/parade'), $filename);

            $parade->gambar = $filename;
        }

        $parade->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'vanue' => $request->vanue,
            'gambar' => $parade->gambar,
        ]);

        return response()->json(['message' => "Berhasil memperbarui parade"]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $parade = Parade::findOrFail($id);

            $parade->delete();

            return response()->json($parade);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
