<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'Id_barang';

    protected $fillable = [
        'Nama_barang', 
        'Harga_barang', 
        'id_kategori', 
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'Id_kategori');
    }

    public $timestamps = false;
}

