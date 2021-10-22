@extends('layouts.main')


<script>
  function addOpsi() {
    document.getElementById('ekstraBuku').innerHTML = "<select class='form-select' name='idbukutambahan' id='idbukutambahan'>" + 
        "<option value='none' disabled selected hidden>Pilih ISBN</option>" +
        "@foreach ($allBuku as $buku)" + 
          "@if ($buku->stok_tersedia > 0)" + 
            "<option value='{{ $buku->idbuku }}'>{{ $buku->isbn }} - {{ $buku->judul }}</option>" + 
          "@endif" + 
        "@endforeach" +
      "</select>"
    document.getElementById('tombolOpsi').innerHTML = "<button type='button' class='btn btn-secondary' onclick='hapusOpsi()'>Hapus Ekstra Buku</button>";
  }
  function hapusOpsi() {
    document.getElementById('ekstraBuku').innerHTML = '';
    document.getElementById('tombolOpsi').innerHTML = "<button type='button' class='btn btn-secondary' onclick='addOpsi()'>Ekstra Buku</button>";
  }
</script>


@section('content')
<script>document.title = "Tambah Peminjaman - Perpustakaan"</script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Peminjaman</h1>
  </div>

  @if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
      {{ $message }}
    </div>
  @elseif($message = Session::get('info'))
    <div class="alert alert-primary" role="alert">
      {{ $message }}
    </div>
  @endif

  <div class="card">
    <div class="card-header"><h4 class="card-title">Form Tambah Peminjaman</h4></div>
    <div class="card-body">
      <div class="col-lg-12">
        <form method="POST" action="{{ route('petugas.addpeminjaman') }}" autocomplete="on">
          @csrf
          <div class="row">
            <div class="col-5">
              <div class="form-group">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
              </div> 
              
              <div class="form-group">
                <label for="nama" class="form-label">Buku:</label>
                <select class="form-select" name="idbuku" id="idbuku">
                  <option value="none" disabled selected hidden>Pilih ISBN</option>
                  @foreach ($allBuku as $buku)
                    @if ($buku->stok_tersedia > 0)
                      <option value="{{ $buku->idbuku }}">{{ $buku->isbn }} - {{ $buku->judul }}</option>
                    @endif
                  @endforeach
                </select>
              </div> 
              
              <div class="form-group" id="ekstraBuku">

              </div>

              <div class="form-group">
                <label for="nim" class="form-label">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo date("Y-m-d") ?>">
              </div> 
            </div>
          </div>
          <br>
          <div class="col-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            &nbsp;
            <a class="btn btn-secondary" href="{{ route('petugas.peminjaman') }}">Cancel</a>
            &nbsp;
            <div id="tombolOpsi">
              <button type="button" class="btn btn-secondary" onclick="addOpsi()">Ekstra Buku</button>
            </div>
          </div>
        </table>
      </form>

      </div>
    </div>
  </div>
</main>
@endsection
