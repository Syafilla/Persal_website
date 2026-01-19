<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id','foto','angkatan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
