@extends('layouts.app')

@section('content')
<style>
.floating-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #ffc107;
    color: black;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    border: 2px solid #ffc107;
    font-weight: bold;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    text-decoration: none !important;
}

.floating-btn:hover {
    background-color: white;
    border: 2px solid #ffc107;
    color: black;
}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header judul">
                        <h4 class="card-title mb-2 text-bold">Master Sub Kriteria</h4>
                        <div class="button-container">
                            <a href="{{'/master-subcriteria/create'}}">
                                <button class="button-add">Tambah Sub Kriteria</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-full-width table-responsive mt-5">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Nama Kriteria</th>
                                <th>Nama Sub Kriteria</th>
                                <th>Bobot</th>
                                <th>Nilai Prioritas</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($subcriteria as $subcriteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subcriteria->criteria->nama }}</td>
                                    <td>{{ $subcriteria->sub_criteria }}</td>
                                    <td>{{ $subcriteria->bobot }}</td>
                                    <td>{{ $subcriteria->nilai_prioritas }}</td>
                                    <td>
                                        <form action="{{ route('subcriteria.destroy', $subcriteria->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
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

        <!-- Button untuk membuka modal -->
        <a href="#" class="floating-btn" data-toggle="modal" data-target="#detailModal">
            <i class="nc-icon nc-notes"> Lihat Detail</i>
        </a>

        <!-- Modal Detail Sub Kriteria -->
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Sub Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="criteriaSelect">Pilih Kriteria</label>
                                <select class="form-control" id="criteriaSelect">
                                    <option value="">-- Pilih Kriteria --</option>
                                    @foreach($criteria as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="row modal-footer">
                        <div class="row button-hitung">
                            <div class="col-12 ">
                                <a href="/master-subcriteria/detail"><button type="button"
                                        class="button-detail">Lihat</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
