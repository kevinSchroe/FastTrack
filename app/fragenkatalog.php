<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fragenkatalog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Kategorie', 'frage', 'antworten', 'richtig',
    ];
}
