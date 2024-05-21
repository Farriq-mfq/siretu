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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('NAMALENGKAP')->nullable();
            $table->string('GURUMAPEL')->nullable();
            $table->string('NAMASAJA')->nullable();
            $table->string('ROMBEL_MAPEL')->nullable();
            $table->string('ROMBEL')->nullable();
            $table->string('MAPEL')->nullable();
            $table->string('NoTelp_Walas')->nullable();
            $table->string('NAMA_WALAS')->nullable();
            $table->string('PANGGILAN_WALAS')->nullable();
            $table->string('NoTelp_BK')->nullable();
            $table->string('NAMA_BK')->nullable();
            $table->string('PANGGILAN_BK')->nullable();
            $table->string('FORWARDTO')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
