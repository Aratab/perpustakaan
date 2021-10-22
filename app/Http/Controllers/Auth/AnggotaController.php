<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth:anggota');
    }

    public function index(Request $request)
    {
        // return view('beranda');
        return view('anggota.dashboard', [ 
            "title" => "Dashboard",
            "nama" => Auth::user()->nama,
            "nim" => Auth::user()->nim,
            "email" => Auth::user()->email,
            "no_telp" => Auth::user()->no_telp,
            "kota" => Auth::user()->kota,
            "alamat" => Auth::user()->alamat,
        ]);
    }

    public function showBuku()
    {
        return view('anggota.buku', [ 
            "title" => "Buku",
            "allBuku" => Buku::all(),
        ]);
    }

    public function showPeminjaman()
    {
        return view('anggota.peminjaman', [ 
            "title" => "Peminjaman",
            "allPeminjaman" => Peminjaman::where('nim', Auth::user()->nim)->get(),
            "allDetail" => DetailTransaksi::all(),
            "allBuku" => Buku::all(),
        ]);
    }
}
