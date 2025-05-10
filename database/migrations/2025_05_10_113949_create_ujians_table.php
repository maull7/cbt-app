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
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mapel');
            $table->string('nama_ujian');
            $table->integer('jumlah_soal');
            $table->integer('soal_acak');
            $table->integer('jawaban_acak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};
