@extends('layouts.app')

@section('content')
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
                                        <a href="{{ route('subcriteria.edit', $subcriteria->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>

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
    </div>
</div>
@endsection