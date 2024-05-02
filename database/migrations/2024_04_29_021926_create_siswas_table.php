<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('notelp', 255)->nullable();
            $table->string('nama', 255);
            $table->string('nipd', 255)->nullable();
            $table->string('jenis_kelamin', 255);
            $table->string('nisn', 255);
            $table->string('tempat_lahir', 255)->nullable();
            $table->string('tanggal_lahir', 255)->nullable();
            $table->string('nik', 255)->nullable();
            $table->string('agama', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('rt', 255)->nullable();
            $table->string('rw', 255)->nullable();
            $table->string('dusun', 255)->nullable();
            $table->string('kelurahan', 255)->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('kode_pos', 255)->nullable();
            $table->string('jenis_tinggal', 255)->nullable();
            $table->string('alat_transportasi', 255)->nullable();
            $table->string('telepon', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('SKHUN', 255)->nullable();
            $table->string('penerima_kps')->nullable();
            $table->string('no_kps', 255)->nullable();
            $table->string('rombel', 255)->nullable();
            $table->string('NAMA_WALAS', 255)->nullable();
            $table->string('PANGGILAN_WALAS', 255)->nullable();
            $table->string('NAMA_BK', 255)->nullable();
            $table->string('PANGGILAN_BK', 255)->nullable();
            $table->string('FORWARDTO', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
