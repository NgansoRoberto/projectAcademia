<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorID extends Model
{
    use HasFactory;

    protected $table = 'matricules_professeur';

    protected $fillable = [
        'matricule',
        'utilise',
    ];
}
