<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stammdaten extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = [
        'Vorname', 'Nachname', 'Strasse', 'Hausnummer', 'Postleitzahl', 'Ort', 'Geburtsdatum','Telefonnummer',
        'IBAN','BIC',
    ];
}
