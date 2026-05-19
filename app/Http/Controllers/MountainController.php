<?php

namespace App\Http\Controllers;

use App\Models\Mountain;

class MountainController extends Controller
{
    public function index()
    {
        $mountains = Mountain::all();

        return view(
            'mountains.index',
            compact('mountains')
        );
    }
}