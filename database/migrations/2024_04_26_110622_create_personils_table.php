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
        Schema::create('personils', function (Blueprint $table) {
            $table->id();
            $table->string('NOTELP')->nullable();
            $table->string('KELOMPOKGURU')->nullable();
            $table->string('NAMASAJA')->nullable();
            $table->string('JABATAN')->nullable();
            $table->string('NAMALENGKAP')->nullable();
            $table->string('KELAMIN')->nullable();
            $table->string('PANGGILAN')->nullable();
            $table->string('NAMADISPO')->nullable();
            $table->string('PANGGILANDISPO')->nullable();
            $table->string('JABATANDISPO')->nullable();
            $table->string('STATUS')->nullable();
            $table->string('INDUKPEGAWAI')->nullable();
            $table->string('INDUKPEGAWAIDISPO')->nullable();
            $table->string('MAPEL')->nullable();
            $table->string('QRCODE1')->nullable();
            $table->string('FORWARDTO')->nullable();
            $table->string('EMAIL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personils');
    }
};
