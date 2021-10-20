<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class PetugasLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:petugas', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      if(Auth::guard('anggota')->check()) {
        return redirect()->intended(route('anggota.dashboard'));
      }
      return view('auth.petugas_login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'idpetugas'   => 'required',
        'password' => 'required|min:8'
      ]);
      // dd($request->all());
      // Attempt to log the user in
      if (Auth::guard('petugas')->attempt(['idpetugas' => $request->idpetugas, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('petugas.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('idpetugas', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('petugas')->logout();
        return redirect('/');
    }
}
