<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'subcriteria';
    protected $fillable = ['criteria_id', 'sub_criteria', 'bobot', 'nilai_prioritas'];

    // Relasi ke Criteria
    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'criteria_id');
    }
}