<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsersModel extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'username',
        'role',
        'alamat',
        'RT',
        'RW',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
