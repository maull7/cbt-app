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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ujian');
            $table->integer('id_kategori_soal');
            $table->string('soal')->nullable();
            $table->integer('id_kategori_jawaban');
            $table->string('pilihan_1')->nullable();
            $table->string('pilihan_2')->nullable();
            $table->string('pilihan_3')->nullable();
            $table->string('pilihan_4')->nullable();
            $table->integer('poin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
