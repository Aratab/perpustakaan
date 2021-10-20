<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Buku;

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
}
