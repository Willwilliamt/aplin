<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    // use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id_users';

    protected $fillable = [
        'username',
        'password',
        'role'
    ];

    public $timestamps = false;
}
