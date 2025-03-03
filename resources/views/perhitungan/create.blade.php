@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Tambah Perhitungan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('perhitungan.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <select class="form-control" id="warga_id" required>
                                            <option value="">-- Pilih Warga --</option>
                                            @foreach($warga as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" minlength="16" maxlength="16"
                                            name="NIK" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control" name="RT" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control" name="RW" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" name="usia" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Status Pekerjaan</label>
                                        <select class="form-control" name="status_pekerjaan" required readonly>
                                            <option value="">-- Pilih Pekerjaan --</option>
                                            <option value="Tidak Bekerja"> Tidak Bekerja
                                            </option>
                                            <option value="Pekerjaan Tidak Tetap">
                                                Pekerjaan Tidak Tetap
                                            </option>
                                            <option value="Pekerjaan Tetap">
                                                Pekerjaan Tetap
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Pendapatan</label>
                                        <input type="number" class="form-control" name="pendapatan" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Jumlah Tanggungan Anak</label>
                                        <input type="number" class="form-control" name="jumlah_tanggungan_anak" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Kepemilikan Rumah</label>
                                        <select class="form-control" name="kepemilikan_rumah" required readonly>
                                            <option value="">-- Pilih Kepemilikan Rumah --</option>
                                            <option value="Menumpang">
                                                Menumpang
                                            </option>
                                            <option value="Sewa">
                                                Sewa
                                            </option>
                                            <option value="Milik Sendiri">
                                                Milik Sendiri
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="button-save pull-right">Simpan Data</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

@endsection
