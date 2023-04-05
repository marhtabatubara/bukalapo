@extends('template.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Data Carousel
            <a href="{{ route('carousel.create') }}" class="btn btn-primary" style="float: right">
                <i class="fa fa-plus"></i> Tambah Carousel</a>
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
                    <th>Nama Carousel</th>
                    <th>Seo Carousel</th>
                    <th>Kategori Postingan</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carousel as $data)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $data->nama_carousel }}</td>
                        <td>{{ $data->seo_carousel }}</td>
                        <td>{{ $data->postingans->nama_postingan }}</td>
                        <td><img src="{{ asset('thumb/'.$data->gambar_carousel) }}" style="width: 100px"></td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan_carousel }}</td>
                        <td>
                            <form action="{{ route('carousel.destroy', $data->id) }}" method="post">
                            @csrf
                            <a href="{{ route('carousel.edit', $data->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i> Edit</a>
                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                                <i class="fa fa-times"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right">{{ $carousel->links() }}</div>
        <div>Jumlah Carousel: {{ $jumlah_carousel }}</div>
    </div>
</div>
@endsection