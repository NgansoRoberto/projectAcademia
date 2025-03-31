<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculeProfesseur extends Model
{
    use HasFactory;

    protected $table = 'matricules_professeur';

    protected $fillable = [
        'matricule',
        'utilise',
    ];

}