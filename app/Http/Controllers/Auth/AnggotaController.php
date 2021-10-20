<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AnggotaController extends Controller
{ 

    use AuthenticatesUsers; 

    public function __construct()
    {
        $this->middleware('auth:anggota');
    } 
    
    public function index()
    {
        // return view('beranda');
        return view('anggota.dashboard',[
            "title" => "Dashboard"
        ]);
    }
}
