<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori', 'angkatan'];
    
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }
}

