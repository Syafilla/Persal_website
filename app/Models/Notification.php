<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'tipe',
        'pesan',
        'link',
        'status',
        'berita_id',
        'komentar_id'
    ];
}
