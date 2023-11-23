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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->integer('nim');
            $table->string('nama');
            $table->string('email');
            $table->string('noHp');
            $table->integer('semester');
            $table->string('jenisBeasiswa');
            $table->string('fileBerkas');
            $table->string('status_ajuan');
            $table->float('ipk');
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
