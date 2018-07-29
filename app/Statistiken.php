<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistiken extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statistiken';
    protected $fillable = [
        'user_id', 'kategorie', 'anzahl_test', 'anzahl_antworten','anzahl_richtig'
    ];

    /**Stellt die Datenbankbeziehungen her*/
    public function user(){

        return $this->belongsTo(User::class);
    }
}
