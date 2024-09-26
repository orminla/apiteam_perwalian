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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('nim');
            $table->string('nama');
            $table->string('kode_jurusan');
            $table->integer('semester');
            $table->integer('id_kelas');
            $table->string('no_hp');
            $table->timestamps();
        });

        Schema::create('jurusan', function (Blueprint $table) {
            $table->string('kode_jurusan')->primary();
            $table->string('nama_jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
