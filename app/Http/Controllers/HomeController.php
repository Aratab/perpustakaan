<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

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
        $allBuku = Buku::all();

        return view("home", [
            "allBuku" => $allBuku,
        ]);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $search = $request->search;

        $allBuku = Buku::where('judul', 'like', "%" . $search . "%")->paginate();

        return view("home", [
            "allBuku" => $allBuku,
        ]);
    }

    public function viewbook($judul)
    {
        return view("viewbook", [
            "isbn" => Buku::where('judul', $judul)->pluck('isbn'),
            "judul" => Buku::where('judul', $judul)->pluck('judul'),
            "gambar" => Buku::where('judul', $judul)->pluck('file_gambar'),
            "pengarang" => Buku::where('judul', $judul)->pluck('pengarang'),
            "penerbit" => Buku::where('judul', $judul)->pluck('penerbit'),
            "kota_terbit" => Buku::where('judul', $judul)->pluck('kota_terbit'),
            "editor" => Buku::where('judul', $judul)->pluck('editor'),
            "sinopsis" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto rem vitae eligendi incidunt excepturi earum quis adipisci omnis voluptatum aut aliquam repudiandae minima in, eaque velit maiores similique minus et.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto rem vitae eligendi incidunt excepturi earum quis adipisci omnis voluptatum aut aliquam repudiandae minima in, eaque velit maiores similique minus et.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto rem vitae eligendi incidunt excepturi earum quis adipisci omnis voluptatum aut aliquam repudiandae minima in, eaque velit maiores similique minus et.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto rem vitae eligendi incidunt excepturi earum quis adipisci omnis voluptatum aut aliquam repudiandae minima in, eaque velit maiores similique minus et.",
            "allbuku" => Buku::all(),
        ]);

    }
}
