@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Tambah Sub Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcriteria.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 " style="padding : 6px;">
                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <select name="criteria_id" class="form-control" required>
                                            <option value="">-- Pilih Kriteria --</option>
                                            @foreach($criteria as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Sub Criteria</label>
                                        <input type="text" class="form-control" name="sub_criteria" required>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="text" class="form-control" name="bobot" required>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai Prioritas</label>
                                        <input type="number" class="form-control" name="nilai_prioritas" step="0.000001"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="button-save pull-right">Simpan</button>
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