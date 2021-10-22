@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Transaksi</h1> 
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">NIM</th> 
          <th scope="col">ISBN Buku</th>
          <th scope="col">Denda (Rupiah)</th>
        </tr>
      </thead>
      <tbody> 
        <tr>
          <td>{{ $peminjaman->nim }}</td>
          <td>{{ $isbn }}</td>
          <td>{{ $diff * 1000 }}</td>
        </tr>
      </tbody>
    </table>
    <div>
      <label for="keterangan">Keterangan:</label>
      @if ($diff == 0) 
        <p>Pengembalian buku tidak jatuh tempo.</p>
      @else 
        <p>Pengembalian buku telah jatuh tempo dan diberikan denda Rp. {{ $diff * 1000 }}.</p>
        <p>Terhitung dari {{ $peminjaman->tgl_pinjam }} sampai {{ date('Y-m-d') }} sebanyak {{ $diff }} hari.</p>
      @endif
    </div>
    <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('petugas.peminjaman')}}'">Kembali</button>
  </div>
</main>
@endsection
