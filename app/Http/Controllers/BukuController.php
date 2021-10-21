<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:petugas');
    }

    
}
