<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fragenkatalog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Kategorie', 'frage', 'richtige_antwort', 'erste_falsche_antwort', 'zweite_falsche_antwort',
    ];
}