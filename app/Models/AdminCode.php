<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCode extends Model
{
    use HasFactory;
    protected $table = 'code_admin';

    protected $fillable = [
        'code',
        'utilise',
    ];
}
