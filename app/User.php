<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Stammdaten;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
      'role', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fahrlehrer_verwaltung(){
        return $this->hasOne(fahrlehrerVerwaltung::class);
    }

    public function stammdaten(){
        return $this->hasOne(Stammdaten::class);
    }

}