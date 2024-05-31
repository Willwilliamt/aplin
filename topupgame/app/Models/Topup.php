<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{    protected $primaryKey = 'ID_TOPUP';

    use HasFactory;

    protected $table = 'topup';

}
