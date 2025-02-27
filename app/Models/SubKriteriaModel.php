<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'subcriteria';
    protected $fillable = ['criteria_id', 'sub_criteria', 'bobot', 'nilai_prioritas'];

    // Relasi ke Kriteria
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id');
    }
}