<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";
    public $timestamps = false;
    protected $primaryKey = "idtransaksi";
    protected $fillable = [
        'nim', 'tgl_pinjam', 'idpetugas', 'total_denda'
    ];

}
