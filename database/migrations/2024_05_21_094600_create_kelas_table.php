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
            $table->string('NAMALENGKAP');
            $table->string('GURUMAPEL');
            $table->string('NAMASAJA');
            $table->string('ROMBEL_MAPEL');
            $table->string('NoTelp_Walas');
            $table->string('NAMA_WALAS');
            $table->string('PANGGILAN_WALAS');
            $table->string('NoTelp_BK');
            $table->string('NAMA_BK');
            $table->string('PANGGILAN_BK');
            $table->string('FORWARDTO');
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
