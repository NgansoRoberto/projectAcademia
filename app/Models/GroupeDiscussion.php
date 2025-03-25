<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeDiscussion extends Model
{
    use HasFactory;

    protected $table = 'groupes_discussion';

    protected $fillable = [
        'nom',
        'createur_id',
    ];

    public function createur()
    {
        return $this->belongsTo(User::class, 'createur_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function membres()
    {
        return $this->hasMany(MembreGroupe::class, 'groupe_id');
    }

    public function utilisateurs()
    {
        return $this->belongsToMany(User::class, 'membres_groupe', 'groupe_id', 'utilisateur_id');
    }
}
