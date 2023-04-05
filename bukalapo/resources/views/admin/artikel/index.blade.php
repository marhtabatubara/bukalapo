@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Data Artikel
            <a href="{{ route('artikel.create') }}" class="btn btn-primary" style="float: right">
                <i class="fa fa-plus"></i> Tambah Artikel</a>
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
                    <th>Nama Artikel</th>
                    <th>Seo Artikel</th>
                    <th>Kategori Postingan</th>
                    <th>Kontributor</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikel as $data)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $data->nama_artikel }}</td>
                        <td>{{ $data->seo_artikel }}</td>
                        <td>{{ $data->postingans->nama_postingan }}</td>
                        <td>{{ $data->users->name }}</td>
                        <td><img src="{{ asset('thumb/'.$data->gambar_artikel) }}" style="width: 100px"></td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan_artikel }}</td>
                        <td>
                            <form action="{{ route('artikel.destroy', $data->id) }}" method="post">
                            @csrf
                            <a href="{{ route('artikel.edit', $data->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i> Edit</a>
                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                                <i class="fa fa-times"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right">{{ $artikel->links() }}</div>
        <div>Jumlah Artikel: {{ $jumlah_artikel }}</div>
    </div>
</div>
@endsection