<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiInfluencer extends Model
{
    protected $table = 'transaksi_influencer';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_influencer',
        'waktu',
        'tanggal',
        'kode_promo',
        'jumlah_promo'
        
    ];

    public $timestamps = false;
}
