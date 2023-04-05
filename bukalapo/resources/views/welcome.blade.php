@extends('layouts.app')

@section('content')
<section id="postingan" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Artikel</h2>
        <hr>
        <div class="row">
            @foreach ($postingan as $data)
                <div class="col-md-4">
                    <div class="card" style="width: 13rem;">
                    <a href="{{ route('foto.artikel', $data->seo_postingan) }}">
                    <img src="{{ asset('images/'.$data->gambar) }}" class="card-img-top" style="width: 200px;" height="150px;">
                <div class="card-body">
                    <h6 class="card-title">{{$data->nama_postingan}}</h6></a>
                    ({{ $data->fotoartikels->count() }} Artikel) <br>
                </div>
                </div>
                </div>
            @endforeach
        </div>
        <br><br><br>
    </div>    
</section>
@endsection