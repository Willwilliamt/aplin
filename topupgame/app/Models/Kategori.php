<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // use HasFactory;
    protected $table = 'kategori';

    protected $primaryKey = 'Id_kategori';

    protected $fillable = [
        'nama_kategori',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id_kategori', 'Id_kategori');
    }
    public function games()
    {
        return $this->hasMany(Game::class, 'id_kategori', 'Id_kategori');
    }

    public $timestamps = false;
}
