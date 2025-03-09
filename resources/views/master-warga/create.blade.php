@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Tambah Warga</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('warga.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" minlength="16" maxlength="16"
                                            name="NIK" required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control" name="RT">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control" name="RW">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" name="usia" required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Status Pekerjaan</label>
                                        <select class="form-control" name="status_pekerjaan" required>
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
                                        <input type="number" class="form-control" name="pendapatan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Jumlah Tanggungan Anak</label>
                                        <input type="number" class="form-control" name="jumlah_tanggungan_anak"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Kepemilikan Rumah</label>
                                        <select class="form-control" name="kepemilikan_rumah" required>
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