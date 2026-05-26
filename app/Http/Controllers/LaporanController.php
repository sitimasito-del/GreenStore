<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Laporan;
use App\Models\Mountain;

use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // FORM LAPORAN
    public function create($id)
    {
        $mountain = Mountain::findOrFail($id);

        $mountains = Mountain::all();

        return view(
            'laporan.create',
            compact(
                'mountain',
                'mountains'
            )
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

        $gambar = null;

        if($request->hasFile('gambar'))
        {
            $gambar = $request->file('gambar')
                ->store(
                    'laporans',
                    'public'
                );
        }

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

    // RIWAYAT LAPORAN USER
    public function riwayat()
    {
        $laporans = Laporan::where(

            'user_id',

            Auth::id()

        )->latest()->get();

        return view(

            'laporan.riwayat',

            compact('laporans')
        );
    }

    // HAPUS LAPORAN
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->delete();

        return back();
    }
}