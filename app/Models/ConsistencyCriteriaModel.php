<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsistencyCriteriaModel extends Model
{
    use HasFactory;
    protected $table = 'consistency_criteria';

    protected $fillable = [
        'criteria_ids',
        'lambda_max',
        'CI',
        'CR',
    ];

    protected $casts = [
        'criteria_ids' => 'array',
    ];

}
