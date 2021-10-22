@extends('layouts.main')

@section('content')
<script>document.title = "Peminjaman - Perpustakaan"</script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Peminjaman</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='{{ route('petugas.tambahdatapinjam') }}'">Tambah Data</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div> 
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th> 
          <th scope="col">NIM</th> 
          <th scope="col">ISBN Buku</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php $no = 0; ?>
          @foreach ($allDetail as $detail)
            <tr>
              <td>{{ ++$no; }}</td> 
              <td>{{ $allPeminjaman->firstWhere('idtransaksi', $detail->idtransaksi)->nim }}</td>
              <td>{{ $allBuku->firstWhere('idbuku', $detail->idbuku)->isbn }}</td>
              @if ($detail->tgl_kembali == null)
                <td style="color: red"><b>Belum Dikembalikan</b></td> 
                <td>
                  <button type="button" class="btn btn-secondary" onclick="location.href='/petugas/pengembalian/{{ $detail->idtransaksi }}/{{ $detail->idbuku }}'">Proses</button>
                </td>
              @else 
                <td style="color: green">Sudah Dikembalikan</td>
                <td>
                  <button type="button" class="btn btn-secondary" onclick="location.href='/petugas/detail/{{ $detail->idtransaksi }}/{{ $detail->idbuku }}'">Detail</button>
                </td>
              @endif 
            </tr>
          @endforeach 
      </tbody>
    </table>
  </div>
</main>
@endsection
