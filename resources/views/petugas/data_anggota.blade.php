@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Anggota</h1> 
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/petugas/data_anggota/addAnggota'">Tambah Anggota</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>

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
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        @foreach ($allAnggota as $anggota)
          <tr>
            <td>{{ ++$no; }}</td>
            <td>{{ $anggota->nim }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->email }}</td>
            <td>
            <a href="data_anggota/editCustomer/{{ $anggota->nim }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              <a href="data_anggota/hapus/{{ $anggota->nim }}" class="btn btn-sm btn-outline-secondary">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection
