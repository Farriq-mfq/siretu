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
        Schema::create('walis', function (Blueprint $table) {
            $table->id();
            $table->string("NOTELP");
            $table->string("NAMA")->nullable();
            $table->string("NAMA_ORTU")->nullable();
            $table->string("GENDER_ORTU")->nullable();
            $table->string("ALAMAT_ORTU")->nullable();
            $table->string("NOINDUK")->nullable();
            $table->string("NISN")->nullable();
            $table->string("AGAMA")->nullable();
            $table->string("FORWARDTO")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walis');
    }
};
