<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Laporan;
use App\Models\Mountain;

class LaporanController extends Controller
{
    // HALAMAN BUAT LAPORAN
    public function create($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view(
            'laporans.create',
            compact('mountain')
        );
    }

    // SIMPAN LAPORAN
    public function store(Request $request)
    {
        $request->validate([

            'mountain_id' => 'required',

            'jenis_laporan' => 'required',

            'deskripsi' => 'required',

            'gambar' => 'nullable|image'
        ]);

        // UPLOAD GAMBAR
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store(
                    'laporans',
                    'public'
                );
        }

        // SIMPAN LAPORAN
        Laporan::create([

            'user_id' => Auth::id(),

            'mountain_id' => $request->mountain_id,

            'jenis_laporan' => $request->jenis_laporan,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'status' => 'Pending'
        ]);

        return redirect('/riwayat')
            ->with(
                'success',
                'Laporan berhasil dikirim'
            );
    }

    // RIWAYAT USER
    public function riwayat()
    {
        $laporans = Laporan::with('mountain')
            ->where(
                'user_id',
                Auth::id()
            )
            ->latest()
            ->get();

        return view(
            'laporans.riwayat',
            compact('laporans')
        );
    }
}