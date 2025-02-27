@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Edit Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 " style="padding : 6px;">
                                    <div class="form-group">
                                        <label>Kode Kriteria</label>
                                        <input type="text" class="form-control" name="kode_criteria"
                                            value="{{ $criteria->kode_criteria }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $criteria->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai Prioritas</label>
                                        <input type="number" class="form-control" name="nilai_prioritas"
                                            value="{{ $criteria->nilai_prioritas }}" step="0.000001" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="button-save pull-right">Update Kriteria</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </d iv>
        </div>
    </div>

    @endsection
