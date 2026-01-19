<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth') 
    ->name('logout');;

Route::get('/register', [AuthController::class, 'registerPage'])
    ->name('register');

Route::post('/register/check-nia', [AuthController::class, 'checkNIARegister']);

Route::post('/register/submit', [AuthController::class, 'registerSubmit']);



// ADMIN
Route::middleware(['auth','hak_akses:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/user/create', [AdminController::class, 'createUser'])
        ->name('form.create');

    Route::post('/admin/user/store', [AdminController::class, 'store'])
        ->name('form.store');

    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])
        ->name('form.edit');

    Route::put('/admin/user/{id}/update', [AdminController::class, 'updateUser'])
        ->name('form.update');

    Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])
        ->name('user.destroy');

    Route::get('/admin/data_anggota', [AdminController::class, 'listAnggota'])
        ->name('anggota.list');
    
    Route::get('/admin/berita', [BeritaController::class,'index'])
        ->name('admin.berita');
        
    Route::get('/admin/berita/create', [BeritaController::class,'create'])
        ->name('admin.berita.create');

    Route::post('/admin/berita/store', [BeritaController::class,'store'])
        ->name('admin.berita.store');

    Route::get('/admin/berita/{id}/edit', [BeritaController::class,'edit'])
        ->name('admin.berita.edit');

    Route::post('/admin/berita/{id}/update', [BeritaController::class,'update'])
        ->name('admin.berita.update');

    Route::delete('/admin/berita/{id}/delete',[BeritaController::class,'delete'])
        ->name('admin.berita.delete');

     Route::get('/admin/notification/read/{id}', [BeritaController::class,'notifyRead'])
        ->name('admin.notification.read');

    Route::get('/admin/profile', [AuthController::class, 'profile'])
        ->name('admin.profile');

    Route::get('/admin/galeri', [GaleriController::class, 'admin'])
        ->name('admin.galeri');

    Route::post('/admin/galeri/tambahKategori', [GaleriController::class, 'storeKategori'])
        ->name('galeri.storeKategori');

    Route::post('/admin/galeri/tambahFoto', [GaleriController::class, 'storeFoto'])
        ->name('galeri.storeFoto');

    Route::delete('/admin/galeri/hapusFoto/{id}', [GaleriController::class, 'hapusFoto'])
        ->name('galeri.hapusFoto');

    Route::delete('/admin/galeri/hapusKategori/{id}', [GaleriController::class, 'hapusKategori'])
        ->name('galeri.hapusKategori');

    Route::post('/admin/komentar/{id}/balas', [BeritaController::class,'balasKomentar'])
        ->name('admin.komen.balas');
    Route::get('/admin/users/export', [AdminController::class, 'exportExcel'])
         ->name('users.export');
});

// ANGGOTA
Route::middleware(['auth','hak_akses:anggota'])->group(function () {
    Route::get('/anggota/dashboard', [AnggotaController::class, 'index'])
        ->name('anggota.dashboard');

    Route::get('/anggota/profile', [AuthController::class, 'profile'])
        ->name('anggota.profile');

    Route::get('/anggota/berita', [BeritaController::class,'indexAnggota'])
        ->name('anggota.berita');

    Route::get('/anggota/berita/{slug}', [BeritaController::class,'detailAnggota'])
        ->name('anggota.berita.detail');

    Route::get('/anggota/galeri', [GaleriController::class, 'index'])
        ->name('galeri');
});

Route::get('/public/galeri', [GaleriController::class, 'indexlic'])
    ->name('galeri.public');

Route::get('/berita', [BeritaController::class,'indexPublic'])
    ->name('berita.public');

Route::get('/berita/{slug}', [BeritaController::class,'detailPublic'])
    ->name('berita.detail');

Route::post('/ubah-password', [AuthController::class,'ubahPassword'])
	->middleware('auth')
	->name('ubah.password');

Route::get('/search', [AdminController::class, 'search']);

Route::post('/check-nia', [AdminController::class, 'checkNIA'])
    ->name('check.nia');

Route::post('/check-username', [AdminController::class, 'checkUsername'])
    ->name('check.username');

Route::get('/galeri/download/{id}', [GaleriController::class,'download'])
    ->name('galeri.download');
    
Route::get('/galeri/filter/{id?}', [GaleriController::class, 'filterAjax'])
    ->name('galeri.filter');

Route::post('/berita/{id}/komentar',[BeritaController::class,'komentar'])
    ->name('berita.komentar');
    
Route::post('/forgot-password/check-email', [PasswordController::class, 'checkEmailDirect'])
    ->name('password.checkEmailDirect');

Route::post('/forgot-password/reset', [PasswordController::class, 'resetDirect'])
    ->name('password.resetDirect');

Route::post('/forgot-nia', [AuthController::class, 'findNia'])
    ->name('forgot.nia');

Route::put('/admin/galeri/updateFoto/{id}',[GaleryController::class, 'updateFoto']
);







