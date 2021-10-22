@extends('layouts.main')

@section('content')
<script>document.title = "Edit Buku - Perpustakaan"</script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Buku</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Buku</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @foreach ($editbuku as $p)
                                        <form method="POST" action="/petugas/buku/editBook"   enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                            <div class="col">
                                            <input type="hidden" name="id"  value="{{ $p->idbuku }}">
                                                <div class="form-group">
                                                    <label for="isbn">ISBN</label>
                                                    <input type="text" id="isbn" class="form-control"
                                                        placeholder="ISBN" name="isbn" value="{{ $p->isbn }}">
                                                </div>
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" id="judul" class="form-control"
                                                    placeholder="Judul" name="judul" value="{{ $p->judul }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang</label>
                                                <input type="text" id="pengarang" class="form-control"
                                                    placeholder="Pengarang" name="pengarang" value="{{ $p->pengarang }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="penerbit">Penerbit</label>
                                                <input type="text" id="penerbit" class="form-control"
                                                    name="penerbit" placeholder="Penerbit" value="{{ $p->penerbit }}">
                                            </div>
                                            </div>
                                            <div class="col">
                                                    <div class="form-group">
                                                        <label for="kotaterbit">Kota Terbit</label>
                                                        <input type="text" id="kotaterbit" class="form-control"
                                                            name="kota_terbit" placeholder="Kota Terbit" value="{{ $p->kota_terbit }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editor">Editor</label>
                                                        <input type="text" id="editor" class="form-control"
                                                            name="editor" placeholder="Editor" value="{{ $p->editor }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stok">Stok</label>
                                                        <input type="number" id="stok" class="form-control"
                                                            name="stok" placeholder="Stok" value="{{ $p->stok }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stoktersedia">Stok Tersedia</label>
                                                        <input type="number" id="stoktersedia" class="form-control"
                                                            name="stok_tersedia" placeholder="StokTersedia" value="{{ $p->stok_tersedia }}">
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary" name="submit" value="Simpan Data">Submit</button>
                                                    <a href="/petugas/buku" class="btn btn secondary">Cancel</a>
                                                </div>
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
