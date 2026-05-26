<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mountain;

class MountainController extends Controller
{
    // DASHBOARD UTAMA
    public function dashboard()
    {
        $mountains = Mountain::all();

        return view(
            'dashboard',
            compact('mountains')
        );
    }

    // DETAIL GUNUNG
    public function detail($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view(
            'mountain-detail',
            compact('mountain')
        );
    }
}