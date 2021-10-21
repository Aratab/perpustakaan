@extends('layouts.app')

@section('content')
<!-- Untuk melihat detail buku -->
<div class="container">
    <div class="row">
        <div class="row justify-content-left">
        <div class="col-4">
            <div class="card border-0 shadow">
                @foreach ($gambar as $idbuku => $gambar)
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="/img/anna.jpg" style="height: 100%; width: 100%; display: block;" src="/img/{{ $gambar }}" data-holder-rendered="true">
                @endforeach    
            </div>          
        </div>
        <div class="col">
                @foreach ($judul as $idbuku => $judul)
                <h3 class="h2 mb-0">{{ $judul }}</h3>
                @endforeach
                <br>
                @foreach ($isbn as $idbuku => $isbn)
                <span class="text-primary">ISBN : {{ $isbn }}</span> <br>
                @endforeach
                
                <ul class="list-unstyled mb-4">
                        @foreach ($pengarang as $idbuku => $pengarang)
                        <li>Pengarang : {{$pengarang}}</a></li>
                        @endforeach

                        @foreach ($penerbit as $idbuku => $penerbit)
                        <li>Penerbit : {{$penerbit}}</a></li>
                        @endforeach

                        @foreach ($editor as $idbuku => $editor)
                        <li>Editor : {{$editor}}</a></li>
                        @endforeach

                        @foreach ($kota_terbit as $idbuku => $kota_terbit)
                        <li>Kota terbit : {{$kota_terbit}}</a></li>
                        @endforeach
                </ul>
                
                <h6>Sinopsis: </h6>
                <a>{{$sinopsis}}</a>
                <div class="col pt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/'">kembali</button>
                </div>
                

    </div>

    </div>
    </div>
</div>
@endsection