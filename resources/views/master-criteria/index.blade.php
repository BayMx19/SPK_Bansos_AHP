@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header judul">
                        <h4 class="card-title mb-2 text-bold">Master Kriteria</h4>
                        <div class="button-container">
                            <a href="{{'/master-criteria/create'}}"><button class="button-add">Tambah
                                    Kriteria</button></a>
                        </div>
                    </div>
                    <div class="card-body table-full-width table-responsive mt-5">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Nilai Prioritas</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($criteria as $criteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $criteria->kode_criteria }}</td>
                                    <td>{{ $criteria->nama }}</td>
                                    <td>{{ $criteria->nilai_prioritas }}</td>
                                    <td>
                                        <!-- <a href="{{ route('criteria.edit', $criteria->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a> -->

                                        <form action="{{ route('criteria.destroy', $criteria->id) }}" method="POST"
                                            style="display:inline;">
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
    </div>
</div>
@endsection
