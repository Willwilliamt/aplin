<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
     // use HasFactory;
     protected $table = 'Influencer';

     protected $primaryKey = 'Id_influencer';
 
     protected $fillable = [
         'Nama_influencer',
         'platform',

     ];
 
     
 
    public $timestamps = false;
}
