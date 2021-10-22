@extends('layouts.app')

@section('content')
<!-- Home -->
<div class="container" style="margin: 10%">
  <div class="row d-flex">
    <div class="col-lg-6 text order-2 order-lg-1">
      <h1>Hai, Selamat Datang di <b>Perpustakaan Artji!</b></h1>
      <p class="hero-text">Jelajahi berbagai hal menarik melalui buku dan buka pikiran tentang luasnya ilmu pengetahuan hingga sastra yang mendunia.</p>
      <div class="CTA">
        <a href="{{ route('anggota.login') }}" class="btn btn-primary btn-shadow btn-gradient link-scroll" style="margin:5px">Login Anggota</a>
        <a href="#daftar_buku" class="btn btn-outline-primary" style="margin:5px">Jelajahi Perpustakaan</a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2"><img class="img-fluid"data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="/img/welcome.png" style="height: 100%; width: 100%; display: block;" src="/img/welcome.png" data-holder-rendered="true"></div>
  </div>
</div>

<!-- Untuk Search -->
<div class="card m-5" id="daftar_buku" style="padding: 2%; border-radius: 30px; background: white">
  <h1 class="text-center">Temukan buku yang Anda cari.</h1>
  <p class="text-center">Cari judul buku yang ingin Anda baca. Anda dapat membacanya saat ini atau meminjamnya untuk dibaca nanti.</p>
<form action="/search" method="GET">
  <div class="input-group" >
    <input type="text" name="search" class="form-control" placeholder="Cari judul buku">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit" style="width:72px">
        <img class="feather feather-search" src="/feather/search.svg" style="filter: invert(50); height: 20px">
      </button>
    </div>
  </div>
</form>


  <!-- List Buku -->
  <table>
    <div class="row mt-3" style="margin: 2%;">
      @foreach ($allBuku as $buku)
      <div class="col-md-2">
        <div class="card mb-2 shadow-sm">
          <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 100%; width: 100%; display: block;" src="/img/{{ $buku->file_gambar }}" data-holder-rendered="true">
          <div class="card-body">
            <p class="card-text"><b>Tersedia: {{ $buku->stok_tersedia }}</b></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href=' /viewbook/{{ $buku->judul}} '">Lihat</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href=' /anggota/login '">Pinjam</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </table>
</div>

<!-- Prosedur Pinjam -->
<div class="container" style="margin: 10%">
  <div class="row d-flex">
    <div class="col-lg-6 order-1"><img class="img-fluid"data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="/img/loket.png" style="height: 100%; width: 100%; display: block;" src="/img/loket.png" data-holder-rendered="true"></div>
    <div class="col-lg-6 text order-2 order-lg-1">
      <h1>Ingin meminjam buku?</h1>
      <h5 class="hero-text" style="font-weight: bold">Pahami terlebih dahulu prosedurnya.</h5>
      <ul style="padding-inline-start: 20px;">
        <li>Pastikan Anda sudah terdaftar sebagai anggota, jika belum, silakan menuju loket peminjaman sambil menunjukkan kartu identitas.</li>
        <li>Setelah terdaftar dan mendapatkan akun, silakan login ke akun Anda.</li>
        <li>Cari buku yang akan Anda pinjam, maksimal 2 buku sekali pinjam.</li>
        <li>Bawa buku tersebut ke loket peminjaman untuk dicatat oleh petugas.</li>
        <li>Detail terkait peminjaman beserta tanggal maksimal pengembalian dapat Anda lihat di akun Anda.</li>
      </ul>
    </div>
  </div>
</div>


@endsection
