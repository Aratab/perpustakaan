<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = [
        'isbn',
        'judul',
        'idkategori',
        'pengarang','penerbit',
        'kota_terbit',
        'editor',
        'stok',
        'stok_tersedia',
        'file_gambar',
    ];
}

