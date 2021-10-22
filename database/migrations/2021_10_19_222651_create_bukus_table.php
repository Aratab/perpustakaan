<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('idbuku');
            $table->string('isbn',20)->unique();
            $table->string('judul');
            $table->unsignedBigInteger('idkategori');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('kota_terbit');
            $table->string('editor',50);
            $table->string('file_gambar')->nullable();
            $table->timestamps();
            $table->integer('stok');
            $table->integer('stok_tersedia');
            $table->foreign('idkategori')->references('idkategori')->on('Kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
