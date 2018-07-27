<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fahrlehrerVerwaltung extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'einsatzgebiet', 'automarke', 'auto_baujahr', 'kennzeichen', 'fahrlehrer_seit', 'beschreibung',
    ];

    // definiert Beziehung zwischen users und fahrlerer_verwaltungs
    public function user(){

        return $this->belongsTo(user::class);
    }

    // definiert Beziehung zwischen stammdatens und fahrlerer_verwaltungs
    public function stammdaten(){

        return $this->belongsTo(Stammdaten::class);
    }
}
