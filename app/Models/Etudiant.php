<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule_etudiant',
        'id_user',
        'filiere_id',
        'groupe_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'filiere_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'etudiant_id');
    }
}
