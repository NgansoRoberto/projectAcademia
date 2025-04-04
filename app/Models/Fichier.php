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
        'seances_id',
        'chemin_fichier',
    ];

    public function cour()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
    public function seance()
    {
        return $this->belongsTo(SeanceCour::class, 'seances_id');
    }
}
