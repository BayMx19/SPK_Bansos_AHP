@extends('layouts.app')

@section('content')
<style>
.floating-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #dc3545;
    color: white;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    border: 2px solid #dc3545;
    font-weight: bold;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.floating-btn:hover {
    background-color: white;
    border: 2px solid #dc3545;
    color: #dc3545;

}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header judul">
                        <h4 class="card-title mb-2 text-bold">Perhitungan AHP</h4>
                        <div class="button-container">
                            <a href="{{'/perhitungan/create'}}"><button class="button-add">Tambah
                                    Perhitungan</button></a>
                        </div>

                    </div>
                    <div class="card-body table-full-width table-responsive mt-5">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                                <th>K4</th>
                                <th>K5</th>
                                <th>Nilai Akhir</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($perhitungan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->warga->nama }}</td>
                                    <td>{{ $item->warga->NIK }}</td>
                                    <td>{{ $item->k1 }}</td>
                                    <td>{{ $item->k2 }}</td>
                                    <td>{{ $item->k3 }}</td>
                                    <td>{{ $item->k4 }}</td>
                                    <td>{{ $item->k5 }}</td>
                                    <td>{{ $item->nilai_akhir}}</td>
                                    <td>
                                        <form action="{{ route('perhitungan.destroy', $item->id) }}" method="POST"
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
        <a href="{{ route('perhitungan.pdf') }}" class="floating-btn">
            Download PDF
        </a>
    </div>
</div>


@endsection