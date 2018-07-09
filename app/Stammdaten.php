<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stammdaten extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'stammdaten_user', 'user_id', 'stammdaten_id');
    }
    protected $fillable = [
        'Vorname', 'Nachname', 'Strasse', 'Hausnummer', 'Postleitzahl', 'Ort', 'Geburtsdatum','Telefonnummer',
        'IBAN','BIC',
    ];
}
