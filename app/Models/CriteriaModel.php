<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'criteria';
    protected $fillable = ['kode_criteria', 'nama', 'nilai_prioritas'];

    // Relasi ke SubCriteria
    public function subCriteria()
    {
        return $this->hasMany(SubCriteriaModel::class, 'criteria_id');
    }
}