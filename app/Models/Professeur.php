<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricule',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cours()
    {
        return $this->hasMany(Cours::class, 'professeur_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'professeur_id');
    }
}
