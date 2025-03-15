<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
       'anno', 'marca', 'modello', 'tipologia', 'cilindrata', 'cavalli',
        'emissioni', 'carburante', 'km', 'colore', 'posti', 'porte', 'prezzo',
        'nuova', 'foto'
    ];
}
