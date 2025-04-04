<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    public function cours()
    {
        return $this->hasMany(cours::class);
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
