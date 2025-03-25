<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'chemin',
        'type',
        'cours_id',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}
