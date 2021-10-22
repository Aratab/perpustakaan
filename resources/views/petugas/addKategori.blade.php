@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Kategori</h1>
    </div>
          <div class="card">
            <div class="card-header"><h4 class="card-title">Masukkan Kategori</h4></div>
            <div class="card-body">
              <div class="col-lg-12">
                <form method="POST" action="addKategori/sukses">
                  @csrf
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="nama">Kategori</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                      </div>
                      <br>
                  </div>
                  </div>
                  <br>
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="/petugas/kategori" class="btn btn secondary">Cancel</a>
                  </div>
                  </table>
              </form>
              </div>
            </div>
          </div>
</main>
@endsection
