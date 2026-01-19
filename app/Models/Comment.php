<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'berita_id',
        'nama',
        'email',
        'komentar',
        'reply_to',
        'balasan',
        'dibaca'
    ];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
