@extends('layouts.app')

@section('content')
<section id="postingan" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Postingan: {{ $postingans->nama_postingan }}</h2><hr>
        <div class="row">
            @foreach ($infodatas as $data)
                <div class="col-md-4">
                    <div class="card" style="width: 13rem;">
                    <a href="{{ asset('images/'.$data->gambar_infodata) }}" data-lightbox="image-1" data-title="{{ $data->keterangan_infodata }}">
                        <img src="{{ asset('images/'.$data->gambar_infodata) }}" class="card-img-top" style="width: 200px;height:150px">
                        <div class="card-body">
                            <h6 class="card-title">{{ $data->nama_infodata}}</h6>
                    </a>
                </div>
                </div>
                </div>
            @endforeach
        </div>
        <div>{{ $infodatas->links() }}</div>
    </div>
    <br><br><br>
</section>
@endsection