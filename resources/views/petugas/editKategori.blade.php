@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Kategori</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Kategori</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @foreach ($editkategori as $k)
                                        <form method="POST" action="/petugas/kategori/update"   enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                            <div class="col">
                                            <input type="hidden" name="id"  value="{{ $k->idkategori}}">
                                                <div class="form-group">
                                                    <label for="nama">Nama Kategori : </label>
                                                    <input type="text" id="nama" class="form-control"
                                                        placeholder="nama" name="nama" value="{{ $k->nama }}">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" name="submit" value="Simpan Data">Submit</button>
                                                    <a href="/petugas/buku" class="btn btn secondary">Cancel</a>
                                                </div>
                                                </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
  </main>
@endsection
