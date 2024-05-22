<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
