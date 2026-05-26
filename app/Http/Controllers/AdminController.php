<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mountain;
use App\Models\Laporan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // DASHBOARD ADMIN PUSAT

    public function dashboard()
    {
        $mountains = Mountain::with('admin')->get();

        $laporans = Laporan::with(
            'user',
            'mountain'
        )->latest()->get();

        // REKAP BULANAN

        $rekapBulanan = Laporan::select(

            DB::raw('MONTH(created_at) as bulan'),

            DB::raw('YEAR(created_at) as tahun'),

            DB::raw('COUNT(*) as total')

        )
        ->groupBy('bulan', 'tahun')
        ->orderBy('tahun', 'DESC')
        ->orderBy('bulan', 'DESC')
        ->get();

        // REKAP TAHUNAN

        $rekapTahunan = Laporan::select(

            DB::raw('YEAR(created_at) as tahun'),

            DB::raw('COUNT(*) as total')

        )
        ->groupBy('tahun')
        ->orderBy('tahun', 'DESC')
        ->get();

        // TOTAL STATUS

        $totalPending = Laporan::where(
            'status',
            'Pending'
        )->count();

        $totalProses = Laporan::where(
            'status',
            'Proses'
        )->count();

        $totalSelesai = Laporan::where(
            'status',
            'Selesai'
        )->count();

        return view(

            'admin.dashboard',

            compact(

                'mountains',
                'laporans',

                'rekapBulanan',
                'rekapTahunan',

                'totalPending',
                'totalProses',
                'totalSelesai'
            )
        );
    }

    // ADMIN GUNUNG

    public function laporans()
    {
        $mountain = Mountain::where(

            'admin_id',

            Auth::id()

        )->first();

        if(!$mountain)
        {
            return back()->with(

                'error',

                'Gunung admin tidak ditemukan'
            );
        }

        $laporans = Laporan::with('user')
            ->where(
                'mountain_id',
                $mountain->id
            )
            ->latest()
            ->get();

        $rekap = [

            'total' => $laporans->count(),

            'pending' => $laporans
                ->where('status', 'Pending')
                ->count(),

            'proses' => $laporans
                ->where('status', 'Proses')
                ->count(),

            'selesai' => $laporans
                ->where('status', 'Selesai')
                ->count(),
        ];

        return view(

            'admin.laporans',

            compact(
                'laporans',
                'mountain',
                'rekap'
            )
        );
    }

    // FORM TAMBAH GUNUNG

    public function createMountain()
    {
        return view(
            'admin.create-mountain'
        );
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

            'admin_password' => 'required|min:6'
        ]);

        // ADMIN GUNUNG

        $admin = User::create([

            'name' => $request->admin_name,

            'email' => $request->admin_email,

            'password' => Hash::make(
                $request->admin_password
            ),

            'role' => 'admin_gunung'
        ]);

        // GAMBAR

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

        return redirect('/admin/dashboard')
            ->with(
                'success',
                'Gunung berhasil ditambahkan'
            );
    }

    // EDIT GUNUNG

    public function editMountain($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view(
            'admin.edit-mountain',
            compact('mountain')
        );
    }

    // UPDATE GUNUNG

    public function updateMountain(Request $request, $id)
    {
        $mountain = Mountain::findOrFail($id);

        $mountain->update([

            'name' => $request->name,

            'description' => $request->description
        ]);

        return redirect('/admin/dashboard')
            ->with(
                'success',
                'Gunung berhasil diupdate'
            );
    }

    // UPDATE STATUS

    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->update([

            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Status berhasil diupdate'
        );
    }
}