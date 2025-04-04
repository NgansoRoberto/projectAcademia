<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliereProfesseur extends Model
{
    use HasFactory;

    protected $table = 'filieres_professeur';

    protected $fillable = [
        'filiere_id',
        'prof_id',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'prof_id');
    }
    public function cours()
    {
        return $this->hasMany(Cours::class, 'filiere_id', 'id');
    }
}
