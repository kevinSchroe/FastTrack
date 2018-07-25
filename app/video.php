<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'video_id', 'video_url', 'video_title',
    ];
}
