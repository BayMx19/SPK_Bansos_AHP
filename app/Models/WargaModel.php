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
        'alamat',
        'usia',
        'status_pekerjaan',
        'pendapatan',
        'jumlah_tanggungan_anak',
        'kepemilikan_rumah',
    ];
}
