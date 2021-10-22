@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buku</h1>
  </div>

  @if ($message = Session::get('gagal'))  
    <div class="alert alert-danger" role="alert">
      {{ $message }}
    </div>
  @elseif ($message = Session::get('info')) 
    <div class="alert alert-info" role="alert">
      {{ $message }}
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection
