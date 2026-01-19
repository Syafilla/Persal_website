<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['kode', 'nama'];

    public function jabatans()
    {
        return $this->belongsToMany(Permission::class, 'permission_jabatan');
    }
}

