@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Postingan</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('postingan.update', $postingan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_postingan">Kategori Postingan</label>
            <input type="text" class="form-control" name="nama_postingan" value="{{$postingan->nama_postingan}}">
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <br><img src="{{ asset('images/'.$postingan->gambar) }}" style="width: 100px">
        </div>
        <div class="form-group">
            <label for="gambar">Ganti Gambar</label>
            <input type="file" class="form-control" name="gambar">
            <label>*) Jika gambar tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/postingan" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection