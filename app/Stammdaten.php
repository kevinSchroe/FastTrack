<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stammdaten extends Model
{

    protected $fillable = [
        'user_id', 'Vorname', 'Nachname', 'Strasse', 'Hausnummer', 'Postleitzahl', 'Ort', 'Geburtsdatum','Telefonnummer',
        'IBAN','BIC',
    ];

    /**Stellt die Datenbankbeziehungen her*/
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function fahrlehrerVerwaltung(){

        return $this->hasOne(fahrlehrerVerwaltung::class);
    }

}