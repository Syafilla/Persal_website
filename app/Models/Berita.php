<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul','slug','kategori','gambar','isi',
        'penulis','tanggal_publish','views'
    ];
    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];
}
