@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1> 
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ISBN</th>
          <th scope="col">Judul</th>
          <th scope="col">Tanggal Pinjam</th> 
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        @foreach ($allPeminjaman as $p)
          @foreach ($allDetail as $d) 
            @if ($d->idtransaksi == $p->idtransaksi && $d->tgl_kembali == null)
              <tr>
                <td> {{ ++$no; }}</td>
                <td>{{ $allBuku->firstWhere('idbuku', $d->idbuku)->isbn }}</td>
                <td>{{ $allBuku->firstWhere('idbuku', $d->idbuku)->judul }}</td>
                <td>{{ $p->tgl_pinjam }}</td>
              </tr>
            @endif              
          @endforeach
        @endforeach
      </tbody>
  </div>
</main>
@endsection
