<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gate;


class video extends Model

{

    public $timestamps = false;
    protected $fillable = [
        'video_url', 'video_title',
    ];

}
