<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Soal extends Model
{
    protected $fillable = [
        'id_ujian',
        'id_kategori_soal',
        'soal',
        'id_kategori_jawaban',
        'pilihan_1',
        'pilihan_2',
        'pilihan_3',
        'pilihan_4',
        'jawaban_benar',
        'poin'
    ];
    public function ujian(): BelongsTo
    {
        return $this->belongsTo(Ujian::class);
    }
}
