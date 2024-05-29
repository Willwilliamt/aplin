<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiConsign extends Model
{
    // use HasFactory;

    protected $table = 'transaksiconsign';

    protected $primaryKey = 'id_consign';

    protected $fillable = [
        'id_barang',
        'id_user',
        'id_seller',
        'Tanggal_transaksi',
        'status',
        'nama_admin'
    ];

    public $timestamps = false;
}
