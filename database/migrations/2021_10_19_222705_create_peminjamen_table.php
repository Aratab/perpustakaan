<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('idtransaksi');
            $table->string('nim',20);
            $table->timestamp('tgl_pinjam');
            $table->integer('total_denda');
            $table->string("idpetugas",20);
            $table->foreign('nim')->references('nim')->on('Anggota');
            $table->foreign('idpetugas')->references('idpetugas')->on('Petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
