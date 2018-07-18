<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fahrlehrerVerwaltung extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fahrlehrer_id', 'fahrlehrer_vorname', 'fahrlehrer_nachname', 'fahrlehrer_geburtsjahr', 'auto_marke', 'auto_baujahr', 'kennzeichen', 'fahrlehrer_seit', 'beschreibung',

];
}
