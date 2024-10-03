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
        Schema::create('referensi', function (Blueprint $table) {
            $table->id('id_referensi');
            $table->timestamps('buku_referensi');
            $table->timmestamps();
        });

        // Membuat tabel rps
        schema::create('rps', function (Blueprint $table){
            $table->id('id_rps');
            $table->unsignedBiginteger('nip');
            $table->unsignedBiginteger('kode_matkul');
            $table->unsignedBiginteger('id_referensi');
            $table->text('deskripsi');
            $table->text('cp_prodi');
            $table->text('cp_matkul');
            $table->text('bobot_penilaian');
            $table->text('metode_penilaian');
            $table->integer('minggu_ke');
            $table->time('waktu');
            $table->text('cp_tahapan_matkul');
            $table->text('bahan_kajian');
            $table->text('sub_bahan_kajian');
            $table->text('bentuk_pembelajaran');
            $table->text('kriterian_penilaian');
            $table->text('bobot_materi');
            $table->date('tanggal_pembuatan');
            $table->date('tanggal_refrensi')->nullable();
            $table->boolean('status_persetujuan');
            $table->date('tanggal_persetujuan');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silabus');
    }
};
