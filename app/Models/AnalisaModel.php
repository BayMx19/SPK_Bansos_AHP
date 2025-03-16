<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaModel extends Model
{
    use HasFactory;
    protected $table = 'analisa';
    protected $fillable = ['data', 'tipe', 'criteria_id'];
}
