<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    // use HasFactory;
    protected $table = 'promo';

    protected $primaryKey = 'Id_promo';

    protected $fillable = [
        'Nama_promo',
        'Jenis_promo',
        'Nilai_promo',
    ];

    

    public $timestamps = false;
}
