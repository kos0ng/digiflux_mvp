<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahUser extends Model
{
    use HasFactory;
    protected $table = 'daerah_user';
    protected $fillable = [
        'id_daerah',
        'daerah',
        'id'
    ];
}
