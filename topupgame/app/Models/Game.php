<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Produk;
use App\Models\Kategori;
class Game extends Model
{
    // use HasFactory;
    protected $table = 'game';

    protected $primaryKey = 'id_game';

    protected $fillable = [
        'name',
        'description',
        'id_kategori',
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'Id_kategori');
    }


    public $timestamps = false;
    /**
     * Get all of the produk for the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class, 'id_game', 'id_game');
    }

}
