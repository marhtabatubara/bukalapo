@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Artikel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('artikel.update', $artikel->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_artikel">Nama Artikel</label>
            <input type="text" class="form-control" name="nama_artikel" value="{{ $artikel->nama_artikel }}">
        </div>
        <div class="form-group">
            <label for="id_postingan">Kategori Postingan</label>
            <select name="id_postingan" class="form-control">
                @foreach ($postingan as $data)
                    <option value="{{ $data->id }}"
                        @if ($data->id == $artikel->id_postingan)
                            selected
                        @endif
                        >{{ $data->nama_postingan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <br><img src="{{ asset('thumb/'.$artikel->gambar_artikel) }}" style="width: 10opx">
        </div>
        <div class="form-group">
            <label for="gambar_artikel">Ganti Gambar</label>
            <input type="file" class="form-control" name="gambar_artikel">
            <label>*) Jika gambar tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="date form-control" name="tanggal" placeholder="yyyy/mm/dd" value="{{ $artikel->tanggal }}">
        </div>
        <div class="form-group">
            <label for="keterangan_artikel"></label>
            <textarea name="keterangan_artikel" class="form-control">{{ $artikel->keterangan_artikel }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/artikel" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection