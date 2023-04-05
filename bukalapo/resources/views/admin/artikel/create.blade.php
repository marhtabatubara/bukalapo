@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Artikel</h4>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_artikel">Nama Artikel</label>
            <input type="text" class="form-control" name="nama_artikel">
        </div>
        <div class="form-group">
            <label for="id_postingan">Kategori Postingan</label>
            <select name="id_postingan" class="form-control">
                <option value="" selected>Pilih Postingan</option>
                @foreach ($postingan as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_postingan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gambar_artikel">Upload Gambar</label>
            <input type="file" class="form-control" name="gambar_artikel">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="date form-control" name="tanggal" placeholder="yyyy/mm/dd">
        </div>
        <div class="form-group">
            <label for="keterangan_artikel">Keterangan</label>
            <textarea name="keterangan_artikel" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/artikel" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection