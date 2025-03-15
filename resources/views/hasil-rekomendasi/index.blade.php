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
                        <h4 class="card-title mb-2 text-bold">Hasil Rekomendasi</h4>
                    </div>
                    @if(auth()->user()->role == 'Staff Kelurahan')
                    <div class="card-body">
                        <form action="{{ route('hasil-rekomendasi.updateLimit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="limit">Jumlah Data Ditampilkan:</label>
                                <input type="number" name="limit" id="limit" class="form-control" value="{{ $limit }}"
                                    required>
                            </div>
                            <div class="row button-hitung">
                                <div class="col-12 ">

                                    <button type="submit" class="button-save float-right">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    <div class="card-body table-full-width table-responsive mt-5">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>

                                <th>Nilai Akhir</th>
                            </thead>
                            <tbody>
                                @foreach ($rekomendasi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->warga->nama }}</td>
                                    <td>{{ $item->warga->NIK }}</td>

                                    <td>{{ $item->nilai_akhir}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <a href="{{ route('hasil-rekomendasi.pdf') }}" class="floating-btn">
            <i class="nc-icon nc-cloud-download-93"> Download PDF</i>
        </a>

    </div>
</div>

@endsection