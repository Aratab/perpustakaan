<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("home", [
            "allBuku" => Buku::all()
        ]);
    }

    public function showBuku() {
        if(Auth::guard('petugas')->check()) {
            return view('petugas.buku', [
                "title" => "Buku",
                "allBuku" => Buku::all()
            ]);
        }
        return view('anggota.buku', [
            "title" => "Buku",
            "allBuku" => Buku::all()
        ]);
    }

    public function showKategori() {
        return view('petugas.kategori',[
            "title" => "Kategori",
            "allKategori" => Kategori::all()
        ]);
    }

    public function showDataAnggota() {
        return view('petugas.data_anggota', [
            'title' => "Data Anggota",
            "allAnggota" => Anggota::all()
        ]);
    }
}
