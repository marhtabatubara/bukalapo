@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Info Data
            <a href="{{ route('infodata.create') }}" class="btn btn-primary" style="float: right">
                <i class="fa fa-plus"></i> Tambah Info Data</a>
        </h4>
    </div>
    <div class="card-body">
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{Session::get('pesan')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Info Data</th>
                    <th>Seo Info Data</th>
                    <th>Kategori Postingan</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infodata as $data)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $data->nama_infodata }}</td>
                        <td>{{ $data->seo_infodata }}</td>
                        <td>{{ $data->postingans->nama_postingan }}</td>
                        <td><img src="{{ asset('thumb/'.$data->gambar_infodata) }}" style="width: 100px"></td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan_infodata }}</td>
                        <td>
                            <form action="{{ route('infodata.destroy', $data->id) }}" method="post">
                            @csrf
                            <a href="{{ route('infodata.edit', $data->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i> Edit</a>
                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                                <i class="fa fa-times"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right">{{ $infodata->links() }}</div>
        <div>Jumlah Info Data: {{ $jumlah_infodata }}</div>
    </div>
</div>
@endsection