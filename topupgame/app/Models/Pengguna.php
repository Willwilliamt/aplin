<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    // use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'Id_user';

    protected $fillable = [
        'Username',
        'Password',
        'Role'
    ];

    public $timestamps = false;
}
