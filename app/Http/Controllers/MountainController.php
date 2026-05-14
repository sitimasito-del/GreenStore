<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mountain;

class MountainController extends Controller
{
    public function index()
    {
        $mountains = Mountain::all();

        return view('mountains.index', compact('mountains'));
    }

    public function create()
    {
        return view('mountains.create');
    }

    public function store(Request $request)
    {
        Mountain::create([
            'nama_gunung' => $request->nama_gunung,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/mountains');
    }
}