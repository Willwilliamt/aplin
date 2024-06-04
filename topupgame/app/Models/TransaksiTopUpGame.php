<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTopUpGame extends Model
{
    use HasFactory;

    protected $table = 'transaksi_top_up_game';
    
    protected $fillable = [
        'id_user', 
        'game_name', 
        'jumlah_topup', 
        'Tanggal_transaksi'
    ];

    public $timestamps = false; 
}
