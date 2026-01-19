<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AnggotaController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        
        $totalAnggota = User::count();

        $anggotaThisYear = User::where('tahun_masuk', $currentYear)->count();
        $anggotaLastYear = User::where('tahun_masuk', $lastYear)->count();

     
        if ($anggotaLastYear > 0) {
            $growthPercent = round(
                (($anggotaThisYear - $anggotaLastYear) / $anggotaLastYear) * 100,
                1
            );
        } else {
            $growthPercent = $anggotaThisYear > 0 ? 100 : 0;
        }

        $maxTarget = max($anggotaThisYear, $anggotaLastYear, 1);

       
        $anggotaMasukPercent = $totalAnggota > 0
            ? round(($anggotaThisYear / $totalAnggota) * 100, 1)
            : 0;

        $totalAlumni  = User::where('status', 'alumni')->count();
        $totalAktif   = User::where('status', 'aktif')->count();

        $persenAlumni = $totalAnggota > 0
            ? round(($totalAlumni / $totalAnggota) * 100, 1)
            : 0;

        
        $chartData = User::selectRaw('hak_akses','tahun_masuk, COUNT(*) as total')
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        $users = User::where('tahun_masuk', $currentYear)->get();
        $countAnggota = $users->count();

        $nama = session('nama');
        $role = session('role');
        return view('anggota.dashboard', compact(
            'nama',
            'role',
            'users',
            'chartData',
            'anggotaThisYear',
            'anggotaLastYear',
            'growthPercent',          
            'anggotaMasukPercent',   
            'totalAnggota',
            'totalAlumni',
            'totalAktif',
            'persenAlumni',
            'currentYear',
            'lastYear',
            'countAnggota'
            
        ));
    }
}

