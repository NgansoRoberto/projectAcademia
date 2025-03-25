<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'user_id',
        'groupe_discussion_id',
    ];

    public function expediteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groupeDiscussion()
    {
        return $this->belongsTo(GroupeDiscussion::class, 'groupe_discussion_id');
    }
}
