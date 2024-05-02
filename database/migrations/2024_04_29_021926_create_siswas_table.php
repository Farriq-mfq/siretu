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
            $table->string('nama', 255);
            $table->string('nipd', 255);
            $table->string('jenis_kelamin', 255);
            $table->string('nisn', 255);
            $table->string('tempat_lahir', 255);
            $table->string('tanggal_lahir', 255);
            $table->string('nik', 255);
            $table->string('agama', 255);
            $table->string('alamat', 255);
            $table->string('rt', 255);
            $table->string('rw', 255);
            $table->string('dusun', 255);
            $table->string('kelurahan', 255);
            $table->string('kecamatan', 255);
            $table->string('kode_pos', 255);
            $table->string('jenis_tanggal', 255);
            $table->string('alat_transportasi', 255);
            $table->string('telepon', 255);
            $table->string('hp', 255);
            $table->string('email', 255);
            $table->string('SKHUN', 255);
            $table->string('penerima_kps');
            $table->string('no_kps', 255);
            $table->string('rombel', 255);
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
