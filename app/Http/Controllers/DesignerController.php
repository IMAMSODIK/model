<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignerRequest;
use App\Http\Requests\UpdateDesignerRequest;
use App\Models\Parade;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Designer',
            'data' => Designer::with('parade')->get(),
            'parade' => Parade::all()
        ];

        return view('designer.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'parade_id' => 'required|exists:parades,id',
        ]);

        Designer::create([
            'nama' => $request->nama,
            'parade_id' => $request->parade_id
        ]);

        return response()->json(['message' => 'Designer berhasil ditambahkan']);
    }


    public function edit(Request $request)
    {
        $id = $request->id;

        try {
            $designer = Designer::findOrFail($id);
            return response()->json($designer);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'parade_id' => 'required|integer'
        ]);

        $d = Designer::find($request->id);

        $d->nama = $request->nama;
        $d->parade_id = $request->parade_id;
        $d->save();

        return response()->json([
            'message' => 'Designer berhasil diupdate'
        ]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $designer = Designer::findOrFail($id);

            $designer->delete();

            return response()->json($designer);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
