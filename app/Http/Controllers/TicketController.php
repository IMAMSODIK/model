<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use App\Models\User;
use App\Models\Vanue;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->id())->first();
        $data = [
            'pageTitle' => 'Ticket',
            'vanue' => Vanue::where('user_id', $user->id)->get(),
            'designer' => Designer::where('user_id', $user->id)->first()
        ];

        return view('ticket.index', $data);
    }

    // public function store(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'nama' => 'required|string'
    //         ]);

    //         Vanue::create([
    //             'nama' => $request->nama,
    //             'user_id' => auth()->id()
    //         ]);

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Vanue berhasil ditambahkan'
    //         ]);
    //     } catch (\Exception $e) {

    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function edit(Request $request)
    // {
    //     $id = $request->id;

    //     try {
    //         $vanue = Vanue::findOrFail($id);
    //         return response()->json($vanue);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Data tidak ditemukan'
    //         ], 404);
    //     }
    // }

    // public function update(Request $request)
    // {
    //     $id = $request->id;
    //     try {
    //         $request->validate([
    //             'nama' => "required|string"
    //         ]);

    //         $vanue = Vanue::findOrFail($id);
    //         $vanue->update([
    //             'nama' => $request->nama
    //         ]);

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Data berhasil diupdate'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Gagal update: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function delete(Request $request)
    // {
    //     $id = $request->id;

    //     try {
    //         $vanue = Vanue::findOrFail($id);

    //         $vanue->delete();

    //         return response()->json($vanue);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Data tidak ditemukan'
    //         ], 404);
    //     }
    // }
}
