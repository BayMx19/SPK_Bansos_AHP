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
                                        <input type="text" class="form-control" name="alamat" id="alamat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" minlength="16" id="NIK" maxlength="16"
                                            name="NIK" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" required
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control" name="RT" id="RT" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control" name="RW" id="RW" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="number" class="form-control" name="usia" id="usia" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Status Pekerjaan</label>
                                        <input type="text" class="form-control" name="status_pekerjaan"
                                            id="status_pekerjaan" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Pendapatan</label>
                                        <input type="number" class="form-control" name="pendapatan" id="pendapatan"
                                            required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Jumlah Tanggungan Anak</label>
                                        <input type="number" class="form-control" name="jumlah_tanggungan_anak"
                                            id="jumlah_tanggungan_anak" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Kepemilikan Rumah</label>
                                        <input type="text" class="form-control" name="kepemilikan_rumah"
                                            id="kepemilikan_rumah" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row button-hitung">
                                <div class="col-12 ">
                                    <button id="hitung" class="button-save">Hitung</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai K1</label>
                                        <input type="number" class="form-control" name="k1" id="k1" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai K2</label>
                                        <input type="number" class="form-control" name="k2" id="k2" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai K3</label>
                                        <input type="number" class="form-control" name="k3" id="k3" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai K4</label>
                                        <input type="number" class="form-control" name="k4" id="k4" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai K5</label>
                                        <input type="number" class="form-control" name="k5" id="k5" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Nilai Akhir</label>
                                        <input type="number" class="form-control" name="nilai_akhir" id="nilai_akhir"
                                            required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row button-hitung">
                                <div class="col-12 ">
                                    <button type="submit" class="button-save">Simpan</button>
                                </div>
                            </div>
                    </div>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#warga_id').change(function() {
        var wargaId = $(this).val();

        if (wargaId) {
            $.ajax({
                url: '/get-warga/' + wargaId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#alamat').val(data.alamat);
                    $('#NIK').val(data.NIK);
                    $('#kelurahan').val(data.kelurahan);
                    $('#kecamatan').val(data.kecamatan);
                    $('#RT').val(data.RT);
                    $('#RW').val(data.RW);
                    $('#usia').val(data.usia);
                    $('#status_pekerjaan').val(data.status_pekerjaan);
                    $('#pendapatan').val(data.pendapatan);
                    $('#jumlah_tanggungan_anak').val(data.jumlah_tanggungan_anak);
                    $('#kepemilikan_rumah').val(data.kepemilikan_rumah);

                },
                error: function() {
                    alert('Gagal mengambil data warga.');
                }
            });
        } else {
            $('#alamat').val('');
            $('#NIK').val('');
            $('#kelurahan').val('');
            $('#kecamatan').val('');
            $('#RT').val('');
            $('#RW').val('');
            $('#usia').val('');
            $('#status_pekerjaan').val('');
            $('#pendapatan').val('');
            $('#jumlah_tanggungan_anak').val('');
            $('#kepemilikan_rumah').val('');
        }
    });

});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#warga_id').select2({
        placeholder: "-- Pilih Warga --",
        allowClear: true
    });
});
</script>


@endsection
