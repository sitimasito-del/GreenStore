<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Mountain;
use App\Models\Laporan;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        $user = Auth::user();

        // ADMIN PUSAT
        if ($user->role == 'admin_pusat') {

            return view('admin.dashboard');
        }

        // ADMIN GUNUNG
        $mountain = Mountain::where(
            'admin_id',
            $user->id
        )->first();

        $laporans = Laporan::with('mountain')
            ->where(
                'mountain_id',
                $mountain->id
            )
            ->latest()
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'laporans',
                'mountain'
            )
        );
    }

    // RIWAYAT LAPORAN
    public function laporans()
    {
        $laporans = Laporan::with('mountain')
            ->latest()
            ->get();

        return view(
            'admin.laporans',
            compact('laporans')
        );
    }

    // KELOLA GUNUNG
    public function mountains()
    {
        $mountains = Mountain::all();

        return view(
            'admin.mountains',
            compact('mountains')
        );
    }

    // HALAMAN TAMBAH GUNUNG
    public function createMountain()
    {
        return view('admin.create-mountain');
    }

    // SIMPAN GUNUNG
    public function storeMountain(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'description' => 'required',

            'image' => 'required|image',

            'admin_name' => 'required',

            'admin_email' => 'required|email|unique:users,email',

            'nomor_wa' => 'required',

            'admin_password' => 'required|min:6',
        ]);

        // BUAT ADMIN GUNUNG
        $admin = User::create([

            'name' => $request->admin_name,

            'email' => $request->admin_email,

            'nomor_wa' => $request->nomor_wa,

            'password' => Hash::make(
                $request->admin_password
            ),

            'role' => 'admin_gunung'
        ]);

        // UPLOAD GAMBAR
        $image = $request->file('image')
            ->store(
                'mountains',
                'public'
            );

        // SIMPAN GUNUNG
        Mountain::create([

            'name' => $request->name,

            'description' => $request->description,

            'image' => $image,

            'admin_id' => $admin->id
        ]);

        return redirect('/admin/mountains');
    }

    // UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->status = $request->status;

        $laporan->save();

        return back();
    }
}