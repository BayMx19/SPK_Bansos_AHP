@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Edit Warga</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $warga->nama }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            value="{{ $warga->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="NIK" minlength="16"
                                            maxlength="16" value="{{$warga->NIK}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan"
                                            value="{{$warga->kecamatan}}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan"
                                            value="{{$warga->kelurahan}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control" name="RT" value="{{ $warga->RT }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control" name="RW" value="{{ $warga->RW }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" name="usia"
                                            value="{{ $warga->usia }}">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Status Pekerjaan</label>
                                        <select class="form-control" name="status_pekerjaan" required>
                                            <option value="Tidak Bekerja"
                                                {{ $warga->status_pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                Tidak
                                                Bekerja
                                            </option>
                                            <option value="Pekerjaan Tidak Tetap"
                                                {{ $warga->status_pekerjaan == 'Pekerjaan Tidak Tetap' ? 'selected' : '' }}>
                                                Pekerjaan Tidak Tetap
                                            </option>
                                            <option value="Pekerjaan Tetap"
                                                {{ $warga->status_pekerjaan == 'Pekerjaan Tetap' ? 'selected' : '' }}>
                                                Pekerjaan Tetap
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Pendapatan</label>
                                        <input type="number" class="form-control" name="pendapatan"
                                            value="{{ $warga->pendapatan }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Jumlah Tanggungan Anak</label>
                                        <input type="number" class="form-control" name="jumlah_tanggungan_anak"
                                            value="{{ $warga->jumlah_tanggungan_anak }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Kepemilikan Rumah</label>
                                        <select class="form-control" name="kepemilikan_rumah" required>
                                            <option value="Menumpang"
                                                {{ $warga->kepemilikan_rumah == 'Menumpang' ? 'selected' : '' }}>
                                                Menumpang
                                            </option>
                                            <option value="Sewa"
                                                {{ $warga->kepemilikan_rumah == 'Sewa' ? 'selected' : '' }}>
                                                Sewa / Kontrak
                                            </option>
                                            <option value="Milik Sendiri"
                                                {{ $warga->kepemilikan_rumah == 'Milik Sendiri' ? 'selected' : '' }}>
                                                Milik Sendiri
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="button-save pull-right">Update Data</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>


@endsection
