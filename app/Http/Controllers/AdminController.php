<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mountain;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // =========================
    // DASHBOARD ADMIN PUSAT
    // =========================

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

    // =========================
    // ADMIN GUNUNG
    // =========================

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

    // =========================
    // DAFTAR GUNUNG
    // =========================

    public function mountains()
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        $mountains = Mountain::with('admin')
            ->when(Auth::user()->role == 'admin_gunung', function($query) {
                $query->where('admin_id', Auth::id());
            })
            ->latest()
            ->get();

        return view(
            'admin.mountains',
            compact('mountains')
        );
    }

    // =========================
    // FORM TAMBAH GUNUNG
    // =========================

    public function createMountain()
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        return view(
            'admin.create-mountain'
        );
    }

    // =========================
    // SIMPAN GUNUNG
    // =========================

    public function storeMountain(Request $request)
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        $adminRules = Auth::user()->role == 'admin_pusat'
            ? [
                'admin_name' => 'required|string|max:255',
                'admin_email' => 'required|email|unique:users,email',
                'nomor_wa' => 'nullable|string|max:30',
                'admin_password' => 'required|min:6',
            ]
            : [];

        $data = $request->validate(array_merge([

            'name' => 'required|string|max:255',

            'description' => 'required|string',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], $adminRules));

        $image = $this->encodeMountainImage(
            $request->file('image')
        );

        // BUAT ADMIN GUNUNG

        if(Auth::user()->role == 'admin_pusat')
        {
            $admin = User::create([

                'name' => $data['admin_name'],

                'email' => $data['admin_email'],

                'password' => Hash::make(
                    $data['admin_password']
                ),

                'role' => 'admin_gunung',

                'nomor_wa' => $data['nomor_wa'] ?? null,
            ]);
        }
        else
        {
            $admin = Auth::user();
        }

        // SIMPAN GUNUNG

        $mountain = Mountain::create([

            'name' => $data['name'],

            'description' => $data['description'],

            'image' => $image,

            'admin_id' => $admin->id
        ]);

        $admin->update([
            'mountain_id' => $mountain->id,
        ]);

        $redirectTo = Auth::user()->role == 'admin_pusat'
            ? '/admin/dashboard'
            : '/admin/mountains';

        return redirect($redirectTo)
            ->with(
                'success',
                'Gunung berhasil ditambahkan'
            );
    }

    // =========================
    // EDIT GUNUNG
    // =========================

    public function editMountain($id)
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        $mountain = $this->findAuthorizedMountain($id);

        return view(
            'admin.edit-mountain',
            compact('mountain')
        );
    }

    // =========================
    // UPDATE GUNUNG
    // =========================

    public function updateMountain(Request $request, $id)
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        $mountain = $this->findAuthorizedMountain($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if($request->hasFile('image'))
        {
            if($mountain->image && str_starts_with($mountain->image, 'mountains/'))
            {
                Storage::disk('public')->delete($mountain->image);
            }

            $mountain->image = $this->encodeMountainImage(
                $request->file('image')
            );
        }

        $mountain->name = $data['name'];

        $mountain->description = $data['description'];

        $mountain->save();

        $redirectTo = Auth::user()->role == 'admin_pusat'
            ? '/admin/dashboard'
            : '/admin/mountains';

        return redirect($redirectTo)
            ->with(
                'success',
                'Gunung berhasil diupdate'
            );
    }

    // =========================
    // HAPUS GUNUNG
    // =========================

    public function destroyMountain($id)
    {
        if($response = $this->authorizeMountainAdmin())
        {
            return $response;
        }

        $mountain = $this->findAuthorizedMountain($id);

        $totalLaporan = Laporan::where('mountain_id', $mountain->id)
            ->count();

        if($totalLaporan > 0)
        {
            return back()
                ->with(
                    'error',
                    'Gunung tidak bisa dihapus karena sudah memiliki laporan'
                );
        }

        if($mountain->image && str_starts_with($mountain->image, 'mountains/'))
        {
            Storage::disk('public')->delete($mountain->image);
        }

        User::where('mountain_id', $mountain->id)
            ->update([
                'mountain_id' => null,
            ]);

        $mountain->delete();

        return redirect('/admin/mountains')
            ->with(
                'success',
                'Gunung berhasil dihapus'
            );
    }

    private function authorizeMountainAdmin()
    {
        if(!Auth::check())
        {
            return redirect('/login')
                ->with(
                    'error',
                    'Silakan login sebagai admin gunung terlebih dahulu'
                );
        }

        if(
            Auth::user()->role != 'admin_gunung' &&
            Auth::user()->role != 'admin_pusat'
        )
        {
            abort(403);
        }

        return null;
    }

    private function findAuthorizedMountain($id)
    {
        $query = Mountain::query();

        if(Auth::user()->role == 'admin_gunung')
        {
            $query->where('admin_id', Auth::id());
        }

        return $query->findOrFail($id);
    }

    private function encodeMountainImage($image)
    {
        $mimeType = $image->getMimeType() ?: 'image/jpeg';

        $imageData = base64_encode(
            file_get_contents($image->getRealPath())
        );

        return 'data:' . $mimeType . ';base64,' . $imageData;
    }

    // =========================
    // UPDATE STATUS LAPORAN
    // =========================

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
// ADMIN ARTIKEL

public function articles()
{
    if(
        !Auth::check() ||
        (
            Auth::user()->role != 'admin_artikel' &&
            Auth::user()->role != 'admin_pusat'
        )
    )
    {
        abort(403);
    }

    $articles = Article::latest()->get();

    $totalArtikel = Article::count();

    $totalKlik = Article::sum('views');

    $artikelTerpopuler = Article::orderByDesc('views')
        ->first();

    $kategoriTerpopuler = Article::select(
            'category',
            DB::raw('SUM(views) as total_views')
        )
        ->groupBy('category')
        ->orderByDesc('total_views')
        ->first();

    return view(
        'admin.articles',
        compact(
            'articles',
            'totalArtikel',
            'totalKlik',
            'artikelTerpopuler',
            'kategoriTerpopuler'
        )
    );
}

public function createArticle()
{
    return view('admin.create-article');
}

public function storeArticle(Request $request)
{
    $request->validate([

        'title' => 'required',

        'category' => 'required',

        'link' => 'required'

    ]);

    Article::create([

        'title' => $request->title,

        'category' => $request->category,

        'link' => $request->link,

        'views' => 0

    ]);

    return redirect('/admin/articles')
        ->with(
            'success',
            'Artikel berhasil ditambahkan'
        );
}

public function editArticle($id)
{
    $article = Article::findOrFail($id);

    return view(
        'admin.edit-article',
        compact('article')
    );
}

public function updateArticle(Request $request, $id)
{
    $request->validate([

        'title' => 'required',

        'category' => 'required',

        'link' => 'required'

    ]);

    $article = Article::findOrFail($id);

    $article->update([

        'title' => $request->title,

        'category' => $request->category,

        'link' => $request->link

    ]);

    return redirect('/admin/articles')
        ->with(
            'success',
            'Artikel berhasil diperbarui'
        );
}

public function deleteArticle($id)
{
    $article = Article::findOrFail($id);

    $article->delete();

    return redirect('/admin/articles')
        ->with(
            'success',
            'Artikel berhasil dihapus'
        );
}

public function deleteMountain($id)
{
    $mountain = Mountain::findOrFail($id);

    Laporan::where(
        'mountain_id',
        $mountain->id
    )->delete();

    if ($mountain->admin_id) {
        User::where(
            'id',
            $mountain->admin_id
        )->delete();
    }

    $mountain->delete();

    return redirect('/admin/dashboard')
        ->with(
            'success',
            'Gunung berhasil dihapus'
        );
}
}
