<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
       'anno', 'marca', 'modello','cilindrata', 'cavalli',
        'emissioni', 'km', 'colore', 'posti', 'porte', 'prezzo',
        'nuova', 'foto', 'tipologia_id','carburante_id',
    ];



    public function carburante(){
        return $this->belongsTo(Carburante::class);
    }

    public function tipologia(){
        return $this->belongsTo(Tipologia::class);
    }
}
