@extends('data')

@section('layout2')

<style>
    .profile-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    .profile-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #eef2ff;
        transition: transform 0.3s ease;
    }
    .profile-img:hover {
        transform: scale(1.05);
    }

    .profile-label {
        font-weight: 500;
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 2px;
        text-transform: uppercase;
    }
    .profile-value {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
    }
</style>

<div class="container mx-auto px-4 py-8">
    <div class="profile-card">

        <div class="flex flex-col items-center text-center mb-8">
            <img src="{{ $user->foto ? asset('foto_anggota/'.$user->foto) : asset('images/default-user.png') }}" 
                 class="profile-img" 
                 alt="Foto Profil">

            <h2 class="text-2xl font-semibold mt-4 text-gray-900">{{ $user->name }}</h2>
            <p class="text-sm text-indigo-600 capitalize">{{ $user->hak_akses }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div>
                <p class="profile-label">NIA</p>
                <p class="profile-value">{{ $user->nia }}</p>
            </div>

            <div>
                <p class="profile-label">Tempat Lahir</p>
                <p class="profile-value">{{ $user->tempat_lahir }}</p>
            </div>

            <div>
                <p class="profile-label">Tanggal Lahir</p>
                <p class="profile-value">{{ $user->tanggal_lahir }}</p>
            </div>

            <div>
                <p class="profile-label">Nama Ayah</p>
                <p class="profile-value">{{ $user->nama_ayah }}</p>
            </div>

            <div>
                <p class="profile-label">Nama Ibu</p>
                <p class="profile-value">{{ $user->nama_ibu }}</p>
            </div>

            <div>
                <p class="profile-label">Tahun Masuk</p>
                <p class="profile-value">{{ $user->tahun_masuk }}</p>
            </div>

            <div>
                <p class="profile-label">Jabatan</p>
                <p class="profile-value">{{ $user->jabatan }}</p>
            </div>

            <div>
                <p class="profile-label">Pendidikan</p>
                <p class="profile-value">{{ $user->pendidikan }}</p>
            </div>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row justify-between gap-4">
            <a href="{{ route('admin.dashboard') }}" 
               class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition duration-300 text-gray-800 text-center w-full sm:w-auto">
               Kembali
            </a>

            <a href="{{ route('form.edit', $user->id) }}"
               class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 text-center w-full sm:w-auto">
               Edit Profil
            </a>
        </div>

    </div>
</div>

@endsection