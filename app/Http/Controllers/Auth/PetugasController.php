<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;

class PetugasController extends Controller
{   
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth:petugas');
    } 
    
    public function index()
    {
        // return view('beranda');
        return view('petugas.dashboard',[
            'title' => 'Dashboard',
            'allBuku' => Buku::all()
        ]);
    }

    public function showBuku() { 
        return view('petugas.buku', [
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
