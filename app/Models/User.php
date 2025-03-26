<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Absence;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Publication;
use App\Models\Notification;
use App\Models\Message;
use App\Models\GroupeDiscussion;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'role',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class, 'user_id');
    }

    public function professeur()
    {
        return $this->hasOne(Professeur::class , 'user_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class , 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class , 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function groupesDiscussion()
    {
        return $this->hasMany(GroupeDiscussion::class, 'createur_id');
    }
}
