@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buku</h1> 
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/petugas/buku/addBuku'">Tambah Buku</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>
  <!-- Session ketika berhasil -->
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif
  
  @if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  @endif

  @if (session()->has('info'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('info') }}
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  @endif

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ISBN</th>
          <th scope="col">Judul</th>
          <th scope="col">Stok</th>
          <th scope="col">Tersedia</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allBuku as $buku)
        <tr>
          <td>{{ $buku->idbuku}}</td>
          <td>{{ $buku->isbn }}</td>
          <td>{{ $buku->judul }}</td>
          <td>{{ $buku->stok }}</td>
          <td>{{ $buku->stok_tersedia }}</td>
          <td>
          <a href="buku/editBook/{{ $buku->idbuku }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <a href="buku/hapus/{{ $buku->idbuku }}" class="btn btn-sm btn-outline-secondary">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection
