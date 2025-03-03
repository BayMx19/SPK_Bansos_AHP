<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaModel extends Model
{
    use HasFactory;

    protected $table = 'warga';

    protected $fillable = [
        'nama',
        'NIK',
        'alamat',
        'RT',
        'RW',
        'kecamatan',
        'kelurahan',
        'usia',
        'status_pekerjaan',
        'pendapatan',
        'jumlah_tanggungan_anak',
        'kepemilikan_rumah',
    ];

    public function warga()
    {
        return $this->hasMany(WargaModel::class, 'warga_id', 'id');
    }
}