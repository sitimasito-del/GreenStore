<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mountain;

class LaporanController extends Controller
{
    // FORM LAPORAN
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
        $gambar = null;

        if($request->hasFile('gambar')){

            $gambar = $request->file('gambar')
                              ->store('laporans', 'public');
        }

        Laporan::create([

            'user_id' => 1,

            'mountain_id' => $request->mountain_id,

            'jenis_laporan' => $request->jenis_laporan,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'status' => 'Pending'
        ]);

        return redirect('/riwayat-laporan');
    }

    // RIWAYAT
    public function riwayat()
    {
        $laporans = Laporan::with('mountain')
                            ->latest()
                            ->get();

        return view(
            'laporans.riwayat',
            compact('laporans')
        );
    }
}