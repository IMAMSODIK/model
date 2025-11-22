<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Http\Controllers\Controller;
use App\Models\Parade;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Madnest\Madzipper\Madzipper;
use ZipArchive;

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

    public function verifikasi(Request $r)
    {
        $tiket = Tiket::with('designer.parade')->where('kode_tiket', $r->kode)->first();
        $data = [
            'pageTitle' => 'Verifikasi Tiket',
            'ticket' => $tiket
        ];

        return view('ticket.index', $data);
    }

    public function verifikasiProses(Request $r){
        $id = $r->id;

        try {
            $tiket = Tiket::findOrFail($id);

            if($tiket->is_hadir){
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }else{
                $tiket->nama_pemilik = $r->nama;
                $tiket->kontak_pemilik = $r->kontak;
                $tiket->is_hadir = 1;
                $tiket->save();

                return response()->json($tiket);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
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

    public function ticket(Request $r)
    {
        $data = [
            'pageTitle' => 'Tiket',
            'data' => Designer::with(['parade', 'tiket'])->where('id', $r->id)->first(),
        ];

        return view('designer.tiket', $data);
    }

    public function generateTicket(Request $r)
    {
        $r->validate([
            'designer' => 'required',
            'kode' => 'required|string|unique:tikets,kode_tiket',
            'tipe' => 'required|in:vvip,reguler',
            'gambar' => 'required'
        ]);

        // --- 1. pastikan folder public/tickets ada ---
        $ticketsPath = public_path('storage/tickets');
        if (!File::exists($ticketsPath)) {
            File::makeDirectory($ticketsPath, 0777, true, true);
        }

        // --- 2. decode base64 ---
        $img = $r->gambar;
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $imageName = 'ticket_' . $r->kode . '.jpg';

        $path = $ticketsPath . '/' . $imageName;

        File::put($path, base64_decode($img));

        // --- 3. insert database ---
        Tiket::create([
            'designer_id' => $r->designer,
            'tipe_tiket' => $r->tipe,
            'kode_tiket' => $r->kode,
            'gambar_tiket' => 'tickets/' . $imageName,
            'status_kehadiran' => 0
        ]);

        return response()->json(['success' => true]);
    }

    public function generateTicketDelete(Request $request)
    {
        $id = $request->id;

        try {
            $tiket = Tiket::findOrFail($id);

            $tiket->delete();

            return response()->json($tiket);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function generateTicketClear(Request $request)
    {
        $id = $request->id;
        Tiket::where('designer_id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Semua tiket berhasil dihapus.'
        ]);
    }

    public function generateTicketDownload($designer_id)
    {
        $tikets = Tiket::where('designer_id', $designer_id)->get();

        if ($tikets->count() == 0) {
            return back()->with('error', 'Tidak ada tiket untuk designer ini.');
        }

        // 2. Nama ZIP
        $zipFileName = 'tiket-designer-' . $designer_id . '-' . time() . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        // 3. Buat ZIP
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

            foreach ($tikets as $t) {

                if ($t->gambar_tiket && Storage::disk('public')->exists($t->gambar_tiket)) {

                    // path file di storage/app/public
                    $filePath = Storage::disk('public')->path($t->gambar_tiket);

                    // nama file di dalam ZIP
                    $newFileName = $t->kode_tiket . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

                    // masukkan ke zip
                    $zip->addFile($filePath, $newFileName);
                }
            }

            $zip->close();
        } else {
            return back()->with('error', 'Gagal membuat file ZIP.');
        }

        // 4. Update status download (opsional)
        Tiket::where('designer_id', $designer_id)->update([
            'is_downloaded' => 1
        ]);

        // 5. Return file untuk di-download user
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
