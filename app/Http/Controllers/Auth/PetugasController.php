<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;
use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Carbon\Carbon; 

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

    // Menambah Buku
    public function addBuku()
    {
        return view("petugas.addBuku", [
            "title" => "Tambah Buku",
            "kategori" => Kategori::pluck('nama', 'idkategori'),
        ]);
    }
    public function storeBuku(Request $request)
    {
        $file_gambar = $request->file('file_gambar');

        $nama_file = $file_gambar->getClientOriginalName();

        $tujuan_upload = 'img';
        $file_gambar->move($tujuan_upload, $nama_file);

        Buku::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'idkategori' => $request->idkategori,
            'penerbit' => $request->penerbit,
            'kota_terbit' => $request->kota_terbit,
            'editor' => $request->editor,
            'stok' => $request->stok,
            'stok_tersedia' => $request->stok_tersedia,
            'file_gambar' => $nama_file,
        ]);

        return redirect('petugas/buku')->with('success', 'New book has been added');
    }

    // Menghapus Buku
    public function deleteBook($id)
    {
        Buku::where('idbuku', $id)->delete();
        return redirect('/petugas/buku')->with('error', 'Member has been removed');
    }

    //Mengupdate Buku
    public function editBook($idbuku)
    {
        $editbuku = Buku::where('idbuku', $idbuku)->get();

        return view('petugas.editBook', [
            "title" => "Edit Book",
            'editbuku' => $editbuku,
        ]);
    }
    public function updateBook(Request $request)
    {
        Buku::where('idbuku', $request->id)->update([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kota_terbit' => $request->kota_terbit,
            'editor' => $request->editor,
            'stok' => $request->stok,
            'stok_tersedia' => $request->stok_tersedia,

        ]);
        return redirect('petugas/buku')->with('info', 'Book has been changed');
    }

    // Menambah Anggota
    public function addAnggota()
    {
        return view("petugas.addAnggota", [
            "title" => "Tambah Pelanggan",
            "allAnggota" => Anggota::all(),
        ]);
    }
    public function storeAnggota(Request $request)
    {
        Anggota::insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password)
        ]);

        return redirect('petugas/data_anggota')->with('success', 'New member has been added');
    }

    // Mengupdate Anggota
    public function editCustomer($nim)
    {
        $anggota = Anggota::where('nim', $nim)->get();

        return view('petugas.editCust', [
            "title" => "Edit Data Anggota",
            'anggota' => $anggota,
        ]);
    }
    public function updateCust(Request $request)
    {
        // update data Anggota
        Anggota::where('nim', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
        ]);
        // alihkan halaman ke halaman Anggota
        return redirect('petugas/data_anggota')->with('info', 'Data has been changed');
    }

    // Delete Anggota
    public function deleteAnggota($n)
    {
        Anggota::where('nim', $n)->delete();
        return redirect('/petugas/data_anggota')->with('error', 'Member has been removed');
    }

    

    // Menambah Kategori
    public function addKategori()
    {
        return view("petugas.addKategori", [
            "title" => "Kategori",
            "allKategori" => Kategori::all()
        ]);
    }
    public function storeKategori(Request $request)
    {
        Kategori::insert([
            'nama' => $request->nama
        ]);

        return redirect('petugas/kategori')->with('success', 'New category has been added');
    }
    // Mengupdate Kategori
    public function editKategori($idkategori)
    {
        $editkategori = Kategori::where('idkategori', $idkategori)->get();

        return view('petugas.editKategori', [
            "title" => "Edit Kategori Buku",
            'editkategori' => $editkategori,
        ]);
    }
    public function updateKategori(Request $request)
    {
        // update data Kategori
        Kategori::where('idkategori', $request->id)->update([
            'nama' => $request->nama,
            
        ]);
        // alihkan halaman ke halaman Kategori
        return redirect('petugas/kategori')->with('info', 'Kategori has been changed');
    }
    //Menghapus Kategori
    public function deleteKategori($k)
    {
        Kategori::where('idkategori', $k)->delete();
        return redirect('/petugas/kategori')->with('error', 'Kategori has been removed');
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

    public function pengembalian() {
        
    }
}
