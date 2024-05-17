<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // use HasFactory;
    protected $table = 'barang';

    protected $primaryKey = 'Id_barang';

    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'id_kategori'
    ];

    public $timestamps = false;
}