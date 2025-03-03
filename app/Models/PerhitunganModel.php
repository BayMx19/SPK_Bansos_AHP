<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganModel extends Model
{
    use HasFactory;
    protected $table = 'perhitungan';
    protected $fillable = ['warga_id', 'k1', 'k2', 'k3', 'k4', 'k5', 'nilai_akhir'];

    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'id');
    }
}