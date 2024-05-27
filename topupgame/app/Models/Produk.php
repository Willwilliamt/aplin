<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
class Produk extends Model
{
    protected $table = 'topup';

    protected $primaryKey = 'ID_TOPUP';

    protected $fillable = [
        'Nama_topup',
        'id_game',
        'harga_topup',
    ];
    public $timestamps = false;
    /**
     * Get the game that owns the produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function games(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'id_game', 'id_game');
    }
}

