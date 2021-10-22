<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;
use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showPeminjaman() {
        return view('petugas.peminjaman', [
            "title" => "Peminjaman",
            "allPeminjaman" => Peminjaman::all(),
            "allDetail" => DetailTransaksi::all(),
            "allBuku" => Buku::all()
        ]);
    }

    public function showFormTambahDataPinjam() {
        return view('petugas.addPeminjaman', [
            "title"=>"Peminjaman",
            'allBuku' => Buku::all()
        ]);
    }

    public function addPeminjaman(Request $request) {
        if(Anggota::where('nim',$request->nim)->count() == 0) {
            return redirect()->back()->with('error', 'Nim tidak terdaftar!');
        }
 
        if($request->idbuku == null) {
            return redirect()->back()->with('error', 'Tidak ada buku yang dipilih!');
        }

        $jumlahPeminjaman = Peminjaman::where('nim',$request->nim)->count();
        if($jumlahPeminjaman > 0) {
            return redirect()->back()->with('error', 'Anggota belum mengembalikan buku dari peminjaman sebelumnya!');
        }

        // Memasukkan data ke tabel Peminjaman
        $tanggal = Carbon::parse($request->tgl_pinjam)->format('Y-m-d');
        $insertPeminjaman = Peminjaman::create([
            'nim' => $request->nim,
            'tgl_pinjam' => $tanggal,
            'idpetugas' => Auth::user()->idpetugas
        ]);
        
        if(!$insertPeminjaman) {
            return redirect()->back()->with('error', 'Terjadi kegagalan! Silahkan coba lagi');
        }

        // Memasukkan data ke tabel Detail Transaksi

        // Buku Pertama
        $lastPeminjaman = Peminjaman::all()->last();
        $insertDetailTransaksiBukuPertama = DetailTransaksi::create([
            'idtransaksi' => $lastPeminjaman->idtransaksi,
            'idbuku' => $request->idbuku
        ]);

        // Jika gagal memasukkan data peminjaman buku pertama
        if(!$insertDetailTransaksiBukuPertama) {
            Peminjaman::where('idtransaksi', $lastPeminjaman->idtransaksi)->delete();
            return redirect()->back()->with('error', 'Terjadi kegagalan! Silahkan coba lagi');
        }

        // Buku Kedua (Jika ada)
        if($request->idbukutambahan != null) {
            $insertDetailTransaksiBukuKedua = DetailTransaksi::create([
                'idtransaksi' => $lastPeminjaman->idtransaksi,
                'idbuku' => $request->idbukutambahan
            ]);

            // Jika gagal memasukkan data peminjaman buku kedua
            if(!$insertDetailTransaksiBukuKedua) {
                Peminjaman::where('idtransaksi', $lastPeminjaman->idtransaksi)->delete();
                DetailTransaksi::where(['idtransaksi' => $lastPeminjaman->idtransaksi, "idbuku"=>$request->idbuku]);
                return redirect()->back()->with('error', 'Terjadi kegagalan! Silahkan coba lagi');
            }
        }


        // Mengurangi stok tersedia untuk Buku Pertama
        $bukuPertama = Buku::firstWhere('idbuku',$request->idbuku);
        Buku::where('idbuku', $request->idbuku)->update([
            'stok_tersedia' => $bukuPertama->stok_tersedia-1
        ]);

        // Mengurangi stok tersedia untuk Buku Kedua
        if($request->idbukutambahan) {
            $bukuKedua = Buku::firstWhere('idbuku',$request->idbukutambahan);
            Buku::where('idbuku', $request->idbukutambahan)->update([
                'stok_tersedia' => $bukuKedua->stok_tersedia-1
            ]);
        }
 
        return redirect()->back()->with('info', 'Berhasil menambahkan data peminjaman');
    }
}
