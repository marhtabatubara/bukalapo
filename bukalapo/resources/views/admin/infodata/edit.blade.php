@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Info Data</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('infodata.update', $infodata->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_infodata">Nama Info Data</label>
            <input type="text" class="form-control" name="nama_infodata" value="{{ $infodata->nama_infodata }}">
        </div>
        <div class="form-group">
            <label for="id_postingan">Kategori Postingan</label>
            <select name="id_postingan" class="form-control">
                @foreach ($postingan as $data)
                    <option value="{{ $data->id }}"
                        @if ($data->id == $infodata->id_postingan)
                            selected
                        @endif
                        >{{ $data->nama_postingan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <br><img src="{{ asset('thumb/'.$infodata->gambar_infodata) }}" style="width: 10opx">
        </div>
        <div class="form-group">
            <label for="gambar_infodata">Ganti Gambar</label>
            <input type="file" class="form-control" name="gambar_infodata">
            <label>*) Jika gambar tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="date form-control" name="tanggal" placeholder="yyyy/mm/dd" value="{{ $infodata->tanggal }}">
        </div>
        <div class="form-group">
            <label for="keterangan_infodata"></label>
            <textarea name="keterangan_infodata" class="form-control">{{ $infodata->keterangan_infodata }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/infodata" class="btn btn-warning">Batal</a>
        </div>
        </form>
    </div>
</div>
@endsection