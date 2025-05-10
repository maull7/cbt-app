<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $fillable = [
        'id_mapel',
        'nama_ujian',
        'jumlah_soal',
        'soal_acak',
        'jawaban_acak',
        'deskripsi'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
