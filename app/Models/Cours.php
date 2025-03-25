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
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }

    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
