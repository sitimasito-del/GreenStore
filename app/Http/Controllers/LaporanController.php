<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mountain;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all();

        return view('laporans.index', compact('laporans'));
    }

    public function create($id)
{
    $mountain = Mountain::findOrFail($id);

    return view('laporans.create', compact('mountain'));
}

    public function store(Request $request)
    {
        Laporan::create([
            'mountain_id' => $request->mountain_id,
            'jenis_laporan' => $request->jenis_laporan,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending'
        ]);

        return redirect('/laporans');
    }
}