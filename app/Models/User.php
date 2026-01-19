<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = [
        'nia',
        'name',
        'email',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'tahun_masuk',
        'jabatan',
        'pendidikan',
        'status',
        'foto',
        'password',
        'hak_akses',
        'is_active'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'nia_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function hasPermission($kode)
    {
        return DB::table('permission_jabatan')
            ->join('permissions', 'permissions.id', '=', 'permission_jabatan.permission_id')
            ->where('permission_jabatan.jabatan', $this->jabatan)
            ->where('permissions.kode', $kode)
            ->exists();
    }
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_jabatan',
            'jabatan',
            'permission_id',
            'jabatan',
            'id'
        );
    }



}
