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
            $table->string('NOTELP', 255)->nullable();
            $table->string('NAMA', 255);
            $table->string('NOINDUK', 255)->nullable();
            $table->string('NISN', 255);
            $table->string('JK', 255);
            $table->string('AGAMA', 255);
            $table->string('ROMBEL', 255)->nullable();
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
        Schema::dropIfExists('siswas');
    }
};
