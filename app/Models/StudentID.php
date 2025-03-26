<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentID extends Model
{
    use HasFactory;

    protected $table = 'matricules_etudiant';

    protected $fillable = [
        'matricule',
        'utilise',
    ];
}
