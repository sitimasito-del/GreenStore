<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mountain;

class LaporanController extends Controller
{
    public function create($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view(
            'laporans.create',
            compact('mountain')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'jenis_laporan' => 'required',

            'deskripsi' => 'required',

            'gambar' => 'nullable|image'

        ]);

        $gambar = null;

        if($request->hasFile('gambar')){

            $gambar = $request->file('gambar')
                              ->store('laporan', 'public');
        }

        Laporan::create([

            'user_id' => auth()->id(),

            'mountain_id' => $request->mountain_id,

            'jenis_laporan' => $request->jenis_laporan,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'status' => 'Pending'
        ]);

        return redirect('/mountains');
    }
}