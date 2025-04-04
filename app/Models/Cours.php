<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'professeur_id',
        'date_creation',
        'filiere_id',
        'nombres_seances',
        'statut',
        'type',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function seances() {
        return $this->hasMany(SeanceCour::class);
    }
}
