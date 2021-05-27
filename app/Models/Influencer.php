<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'influencer';
    protected $fillable = [
        'username',
        'nama',
        'following',
        'follower',
        'tipe_bank',
        'norek',
        'likes',
        'comments',
        'share',
        'instastory',
        'engagement',
        'post',
        'reach'
    ];
}
