<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'sujet',
        'date',
        'expediteur_id',
        'filiere_id',
        'cours_id',
        'statut',
        'user_id',
    ];

    protected $table = 'notifications';

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }
    public function user_send()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }
    public function user_receive()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cour()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
