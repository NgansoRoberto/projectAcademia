<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'cours_id',
        'professeur_id',
        'date',
        'raison',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }
}
