<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable()->after('password');
            $table->date('tanggal_lahir')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->enum('jabatan', ['Pengurus', 'Anggota'])->nullable();
            $table->enum('pendidikan', ['SLTP', 'SLTA', 'PT', 'Pasca Sarjana'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tempat_lahir',
                'tanggal_lahir',
                'tahun_masuk',
                'nama_ayah',
                'nama_ibu',
                'jabatan',
                'pendidikan',
            ]);
        });
    }
};
