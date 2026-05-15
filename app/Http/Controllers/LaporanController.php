<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Mountain;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $mountains = Mountain::all();

        return view('laporans.index',
            compact('mountains'));
    }

    public function create($id)
    {
        $mountain = Mountain::find($id);

        return view('laporans.create',
            compact('mountain'));
    }

    public function store(Request $request)
    {
        $gambar = null;

        if($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('laporans', 'public');
        }

        Laporan::create([

            'mountain_id' => $request->mountain_id,

            'jenis_laporan' => $request->jenis_laporan,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'status' => 'pending'

        ]);

        return redirect('/laporans');
    }
}