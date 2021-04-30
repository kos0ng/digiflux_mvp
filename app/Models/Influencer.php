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
        'name',
        'email',
        'password',
        'role',
        'image',
    ];
}
