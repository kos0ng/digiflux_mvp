<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'photo_campaign',
        'produk',
        'tipe',
        'biaya',
        'deadline',
        'jenis',
        'laporan',
        'post',
        'deskripsi',
        'syarat',
        'status_campaign',
        'id_user',
        'payment',
    ];
}
