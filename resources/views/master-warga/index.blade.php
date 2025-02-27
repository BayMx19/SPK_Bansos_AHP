@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header judul">
                        <h4 class="card-title mb-2 text-bold">Master Warga</h4>
                        <div class="button-container">
                            <a href="{{'/master-warga/create'}}"><button class="button-add">Tambah Warga</button></a>
                        </div>

                    </div>
                    <div class="card-body table-full-width table-responsive mt-5">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Usia</th>
                                <th>Status Pekerjaan</th>
                                <th>Pendapatan</th>
                                <th>Jumlah Tanggungan Anak</th>
                                <th>Kepemilikan Rumah</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($warga as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat ?? '-' }}</td>
                                    <td>{{ $item->usia }}</td>
                                    <td>{{ $item->status_pekerjaan }}</td>
                                    <td>Rp{{ number_format($item->pendapatan, 0, ',', '.') }}</td>
                                    <td>{{ $item->jumlah_tanggungan_anak }}</td>
                                    <td>{{ $item->kepemilikan_rumah }}</td>
                                    <td>
                                        <a href="{{ route('warga.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('warga.destroy', $item->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection