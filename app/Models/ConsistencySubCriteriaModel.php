<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsistencySubCriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'consistency_subcriteria';

    protected $fillable = [
        'subcriteria_ids',
        'lambda_max',
        'CI',
        'CR',
    ];

    protected $casts = [
        'subcriteria_ids' => 'array',
    ];

}