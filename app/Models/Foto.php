<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'status',
        'album_id',
        'users_id',
    ];
}
