<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fahrlehrerVerwaltung extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'einsatzgebiet', 'automarke', 'auto_baujahr', 'kennzeichen', 'fahrlehrer_seit', 'beschreibung',
];
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function stammdaten(){

        return $this->belongsTo(Stammdaten::class);
    }
}
