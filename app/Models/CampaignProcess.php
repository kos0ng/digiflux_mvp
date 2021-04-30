<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignProcess extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_process';
    protected $table = 'campaign_process';
    public $timestamps = false;
    protected $fillable = [
        'id_campaign',
        'id_user',
        'status',
        'shortcode',
        'url_photo',
        'likes',
        'comments',
        'share',
        'jangkauan',
        'bukti',
    ];
}
