@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Postingan</h4>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('postingan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_postingan">Kategori Postingan </label>
            <input type="text" class="form-control" name="nama_postingan">
        </div>
        <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/postingan" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection