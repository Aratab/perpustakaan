<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;
    protected $guard = "petugas";
    protected $table = "petugas";
    protected $primaryKey = "idpetugas";
    protected $fillable = [
        'idpetugas',
        'nama',
        'password',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
}
