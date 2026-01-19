<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data dari database
     */
     public function collection(): Collection
    {
        return User::all()->map(function ($user) {
            return [
                $user->nia,
                $user->name,
                $user->tempat_lahir . ', ' . $user->tanggal_lahir,
                $user->alamat,
                $user->pendidikan,
                $user->jabatan,
                $user->status,
                $user->tahun_masuk,
            ];
        });
    }

    /**
     * Header kolom Excel
     */
    public function headings(): array
    {
        return [
            'N.I.A',
            'Username',
            'TE_TA_LA',
            'Alamat',
            'Pendidikan',
            'Jabatan',
            'Status',
            'Tahun Masuk'
        ];
    }

}
