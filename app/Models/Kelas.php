<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    protected $fillable = [
        'kelas',
        'nama_kelas',
        'id_jurusan'
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_kelas', 'id');
    }
}
