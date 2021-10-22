@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Data Pelanggan</h1>
    </div>
          <div class="card">
            <div class="card-header"><h4 class="card-title">Masukkan Perubahan Data</h4></div>
            <div class="card-body">
              <div class="col-lg-12">
                @foreach ($anggota as $p)
                <form method="POST" autocomplete="on" action="/petugas/data_anggota/update">
                @csrf
                  <div class="row">
                    <div class="col">
                    <input type="hidden" name="id"  value="{{ $p->nim }}">
                      <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="{{ $p->nim }}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama"value="{{ $p->nama }}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" row = "5">{{ $p->alamat }}</textarea>
                      </div>
                      <br>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="kota">Kota:</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="{{ $p->kota }}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $p->email }}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="no_telp">No Telp:</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ $p->no_telp }}">
                      </div>
                      <br>
                      <div class="col">
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="text" class="form-control" id="password" name="password" value="{{ $p->password }}">
                        </div>
                      </div>
                  </div>
                  </div>
                  <br>
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="/petugas/data_anggota" class="btn btn secondary">Cancel</a>
                  </div>
                  </table>
              </form>
              @endforeach
              </div>
            </div>
          </div>
</main>
@endsection
