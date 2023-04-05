@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Carousel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('carousel.update', $carousel->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_carousel">Nama Carousel</label>
            <input type="text" class="form-control" name="nama_carousel" value="{{ $carousel->nama_carousel }}">
        </div>
        <div class="form-group">
            <label for="id_postingan">Kategori Postingan</label>
            <select name="id_postingan" class="form-control">
                @foreach ($postingan as $data)
                    <option value="{{ $data->id }}"
                        @if ($data->id == $carousel->id_postingan)
                            selected
                        @endif
                        >{{ $data->nama_postingan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <br><img src="{{ asset('thumb/'.$carousel->gambar_carousel) }}" style="width: 10opx">
        </div>
        <div class="form-group">
            <label for="gambar_carousel">Ganti Gambar</label>
            <input type="file" class="form-control" name="gambar_carousel">
            <label>*) Jika gambar tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="date form-control" name="tanggal" placeholder="yyyy/mm/dd" value="{{ $carousel->tanggal }}">
        </div>
        <div class="form-group">
            <label for="keterangan_carousel"></label>
            <textarea name="keterangan_carousel" class="form-control">{{ $carousel->keterangan_carousel }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/carousel" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection