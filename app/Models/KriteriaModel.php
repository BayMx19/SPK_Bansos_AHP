<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'criteria';
    protected $fillable = ['kode_criteria', 'nama', 'nilai_prioritas'];

    // Relasi ke SubKriteria
    public function subKriteria()
    {
        return $this->hasMany(SubKriteriaModel::class, 'criteria_id');
    }
}
