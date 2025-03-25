<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreGroupe extends Model
{
    use HasFactory;

    protected $table = 'membres_groupe';

    protected $fillable = [
        'groupe_id',
        'user_id',
    ];

    public function groupe()
    {
        return $this->belongsTo(GroupeDiscussion::class, 'groupe_id');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}